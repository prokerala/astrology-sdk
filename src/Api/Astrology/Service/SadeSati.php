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
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedSadeSati as AdvancedSadeSatiResult;
use Prokerala\Api\Astrology\Result\Horoscope\SadeSati as SadeSatiResult;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class SadeSati
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    /** @use TimeZoneAwareTrait<SadeSatiResult|AdvancedSadeSatiResult> */
    use TimeZoneAwareTrait;

    protected string $slug = '/astrology/sade-sati';

    /** @var Transformer<AdvancedSadeSatiResult> */
    private \Prokerala\Api\Astrology\Transformer $advancedResponseTransformer;

    /** @var Transformer<SadeSatiResult> */
    private \Prokerala\Api\Astrology\Transformer $basicResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformer = new Transformer(SadeSatiResult::class);
        $this->advancedResponseTransformer = new Transformer(AdvancedSadeSatiResult::class);
        $this->addDateTimeTransformer($this->advancedResponseTransformer);
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location Location details
     * @param \DateTimeInterface $datetime Date and time
     *
     * @return AdvancedSadeSatiResult|SadeSatiResult
     */
    public function process(Location $location, \DateTimeInterface $datetime, bool $detailed_report = false)
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);
        assert($apiResponse instanceof \stdClass);
        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformer->transform($apiResponse->data);
    }
}
