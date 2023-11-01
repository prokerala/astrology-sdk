<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Western\Service\Charts;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Astrology\Western\Result\Charts\CompositeChart as CompositeChartResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class CompositeChart
{
    use ClientAwareTrait;

    protected string $slug = '/astrology/composite-chart';

    /** @var Transformer<CompositeChartResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(CompositeChartResult::class);
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
        Location $currentLocation,
        \DateTimeImmutable $transitDateTime,
        string $houseSystem,
        string $orb,
        bool $primaryBirthTimeUnknown,
        bool $secondaryBirthTimeUnknown,
        string $rectificationChart,
        string $aspectFilter
    ): CompositeChartResult
    {

        $parameters = [
            'partner_a_dob' => $primaryBirthTime->format('c'),
            'partner_a_coordinates' => $primaryBirthLocation->getCoordinates(),
            'partner_b_dob' => $secondaryBirthTime->format('c'),
            'partner_b_coordinates' => $secondaryBirthLocation->getCoordinates(),
            'transit_datetime' => $transitDateTime->format('c'),
            'current_coordinates' => $currentLocation->getCoordinates(),
            'house_system' => $houseSystem,
            'orb' => $orb,
            'partner_a_birth_time_unknown' => $primaryBirthTimeUnknown,
            'partner_b_birth_time_unknown' => $secondaryBirthTimeUnknown,
            'birth_time_rectification' => $rectificationChart,
            'aspect_filter' => $aspectFilter,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
