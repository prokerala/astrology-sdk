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
use Prokerala\Api\Numerology\Result\Pythagorean\EssenceResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class EssenceNumber
{
    use ClientAwareTrait;
    /** @use TimeZoneAwareTrait<EssenceResult> */
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/essence-number';

    /** @var Transformer<EssenceResult> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(EssenceResult::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @return EssenceResult
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(\DateTimeInterface $datetime, string $firstName, string $middleName, string $lastName, \DateTimeImmutable $dateOfBirth)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'date_of_birth' => $dateOfBirth->format('c'),
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
