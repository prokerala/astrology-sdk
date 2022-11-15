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
use Prokerala\Api\Numerology\Result\Pythagorean\SoulUrge;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class SoulUrgeNumber
{
    use ClientAwareTrait;

    /** @use TimeZoneAwareTrait<SoulUrge> */
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/soul-urge-number';

    /** @var Transformer<SoulUrge> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(SoulUrge::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @return SoulUrge
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(string $firstName, string $middleName, string $lastName, bool $additionalVowel)
    {
        $parameters = [
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'additional_vowel' => $additionalVowel,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
