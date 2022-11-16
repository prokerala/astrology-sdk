<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class Chart
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected string $slug = '/astrology/chart';

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location   Location details
     * @param \DateTimeInterface $datetime   Date and time
     * @param string             $chart_type Chart type
     */
    public function process(Location $location, \DateTimeInterface $datetime, string $chart_type, string $chart_style, string $la = 'en'): string
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
            'chart_type' => $chart_type,
            'chart_style' => $chart_style,
            'la' => $la,
        ];

        return $this->apiClient->process($this->slug, $parameters); // @phpstan-ignore-line
    }
}
