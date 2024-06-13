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
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\TransitChart as TransitChartResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class TransitChart
{
    use ClientAwareTrait;

    protected string $slug = '/astrology/transit-planet-position';

    /** @var Transformer<TransitChartResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(TransitChartResult::class);
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
        \DateTimeImmutable $transitDatetime,
        string $houseSystem,
        string $orb,
        bool $birthTimeUnknown,
        string $rectificationChart,
        string $la = 'en',
    ): TransitChartResult {

        $parameters = [
            'profile[datetime]' => $datetime->format('c'),
            'profile[coordinates]' => $location->getCoordinates(),
            'profile[birth_time_unknown]' => $birthTimeUnknown,
            'transit_datetime' => $transitDatetime->format('c'),
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
