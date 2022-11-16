<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Calendar\Service;

use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Calendar\Result\CalendarDate as CalendarDateResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class CalendarDate
{
    use ClientAwareTrait;

    protected string $slug = '/calendar';

    /** @var Transformer<CalendarDateResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(CalendarDateResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(string $calendar, \DateTimeInterface $date, string $la = 'en'): CalendarDateResult
    {
        $parameters = [
            'calendar' => $calendar,
            'date' => $date->format('Y-m-d'),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
