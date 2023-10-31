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
use Prokerala\Api\Astrology\Western\Result\Charts\NatalChart as NatalChartResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class NatalChart
{
    use ClientAwareTrait;

    protected string $slug = '/astrology/natal-chart';

    /** @var Transformer<NatalChartResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(NatalChartResult::class);
    }

    /**
     * Fetch result from API.
     *
     *@throws RateLimitExceededException
     **
     * @throws QuotaExceededException
     */
    public function process(
        Location $location,
        \DateTimeImmutable $datetime,
        string $houseSystem,
        string $orb,
        bool $birthTimeUnknown,
        string $rectificationChart,
        string $aspectFilter
    ): NatalChartResult
    {

        $parameters = [
            'coordinates' => $location->getCoordinates(),
            'datetime' => $datetime->format('c'),
            'house_system' => $houseSystem,
            'orb' => $orb,
            'birth_time_unknown' => $birthTimeUnknown,
            'birth_time_rectification' => $rectificationChart,
            'aspect_filter' => $aspectFilter,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
