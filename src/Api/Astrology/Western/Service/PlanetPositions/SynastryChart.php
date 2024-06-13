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
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\SynastryChart as SynastryChartResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class SynastryChart
{
    use ClientAwareTrait;

    protected string $slug = '/astrology/synastry-planet-aspect';

    /** @var Transformer<SynastryChartResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(SynastryChartResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @throws RateLimitExceededException
     * @throws QuotaExceededException
     */
    public function process(
        Location $primaryBirthLocation,
        \DateTimeImmutable $primaryBirthTime,
        Location $secondaryBirthLocation,
        \DateTimeImmutable $secondaryBirthTime,
        string $houseSystem,
        string $chartType,
        string $orb,
        bool $primaryBirthTimeUnknown,
        bool $secondaryBirthTimeUnknown,
        string $rectificationChart,
        string $la = 'en',
    ): SynastryChartResult {

        $parameters = [
            'primary_profile[datetime]' => $primaryBirthTime->format('c'),
            'primary_profile[coordinates]' => $primaryBirthLocation->getCoordinates(),
            'primary_profile[birth_time_unknown]' => $primaryBirthTimeUnknown,
            'secondary_profile[datetime]' => $secondaryBirthTime->format('c'),
            'secondary_profile[coordinates]' => $secondaryBirthLocation->getCoordinates(),
            'secondary_profile[birth_time_unknown]' => $secondaryBirthTimeUnknown,
            'house_system' => $houseSystem,
            'chart_type' => $chartType,
            'orb' => $orb,
            'birth_time_rectification' => $rectificationChart,
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
