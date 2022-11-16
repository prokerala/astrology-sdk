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
use Prokerala\Api\Astrology\Result\Panchang\AdvancedPanchang as AdvancedPanchangResult;
use Prokerala\Api\Astrology\Result\Panchang\Panchang as PanchangResult;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class Panchang
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    /** @use TimeZoneAwareTrait<PanchangResult|AdvancedPanchangResult> */
    use TimeZoneAwareTrait;

    protected string $slug = '/astrology/panchang';

    /** @var Transformer<PanchangResult> */
    private \Prokerala\Api\Astrology\Transformer $basicResponseTransformer;

    /** @var Transformer<AdvancedPanchangResult> */
    private \Prokerala\Api\Astrology\Transformer $advancedResponseTransformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->basicResponseTransformer = new Transformer(PanchangResult::class);
        $this->addDateTimeTransformer($this->basicResponseTransformer);
        $this->advancedResponseTransformer = new Transformer(AdvancedPanchangResult::class);
        $this->addDateTimeTransformer($this->advancedResponseTransformer);
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location        Location details
     * @param \DateTimeInterface $datetime        Date and time
     * @param bool               $detailed_report Return detailed result
     *
     * @return AdvancedPanchangResult|PanchangResult
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(Location $location, \DateTimeInterface $datetime, bool $detailed_report = false, string $la = 'en')
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($slug, $parameters);
        assert($apiResponse instanceof \stdClass);
        if ($detailed_report) {
            return $this->advancedResponseTransformer->transform($apiResponse->data);
        }

        return $this->basicResponseTransformer->transform($apiResponse->data);
    }
}
