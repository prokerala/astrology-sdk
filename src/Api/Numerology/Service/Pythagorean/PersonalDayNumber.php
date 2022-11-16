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

use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Numerology\Result\Pythagorean\PersonalDay;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class PersonalDayNumber
{
    use ClientAwareTrait;

    protected string $slug = '/numerology/personal-day-number';

    /** @var Transformer<PersonalDay> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(PersonalDay::class);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(\DateTimeInterface $datetime, int $referenceYear): PersonalDay
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'reference_year' => $referenceYear,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
