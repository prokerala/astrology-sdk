<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Numerology\Service;

use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Numerology\Result\PersonalYear;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class PersonalYearNumber
{
    use ClientAwareTrait;
    /** @use TimeZoneAwareTrait<PersonalYear> */
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/personal-year-number';

    /** @var Transformer<PersonalYear> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(PersonalYear::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @return PersonalYear
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(\DateTimeInterface $datetime, int $referenceDate)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'reference_year' => $referenceDate,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
