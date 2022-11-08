<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Numerology\Service\Pythagorean;

use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Numerology\Result\Pythagorean\PersonalDay;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class PersonalDayNumber
{
    use ClientAwareTrait;
    /** @use TimeZoneAwareTrait<PersonalDay> */
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/personal-day-number';

    /** @var Transformer<PersonalDay> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(PersonalDay::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @return PersonalDay
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(\DateTimeInterface $datetime, int $referenceYear)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'reference_year' => $referenceYear,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}