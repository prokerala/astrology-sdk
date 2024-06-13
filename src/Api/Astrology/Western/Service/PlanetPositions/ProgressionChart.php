<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Western\Service\PlanetPositions;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\ProgressionChart as ProgressionChartResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class ProgressionChart
{
    use ClientAwareTrait;

    protected string $slug = '/astrology/progression-planet-position';

    /** @var Transformer<ProgressionChartResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(ProgressionChartResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @throws RateLimitExceededException
     * @throws QuotaExceededException
     */
    public function process(
        Location $location,
        \DateTimeImmutable $datetime,
        Location $transitLocation,
        int $progressionYear,
        string $houseSystem,
        string $orb,
        bool $birthTimeUnknown,
        string $rectificationChart,
        string $la = 'en',
    ): ProgressionChartResult {

        $parameters = [
            'profile[datetime]' => $datetime->format('c'),
            'profile[coordinates]' => $location->getCoordinates(),
            'profile[birth_time_unknown]' => $birthTimeUnknown,
            'progression_year' => $progressionYear,
            'current_coordinates' => $transitLocation->getCoordinates(),
            'house_system' => $houseSystem,
            'orb' => $orb,
            'birth_time_rectification' => $rectificationChart,
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
