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
use Prokerala\Api\Astrology\Transformer as TransformerAlias;
use Prokerala\Api\Numerology\Result\AttainmentNumberResult;
use Prokerala\Api\Numerology\Result\BridgeNumberResult;
use Prokerala\Api\Numerology\Result\LifePathResult;
use Prokerala\Api\Numerology\Result\RationalThoughtResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Traits\Api\ClientAwareTrait;

final class AttainmentNumber
{
    use ClientAwareTrait;
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/attainment-number';

    /** @var TransformerAlias<AttainmentNumberResult> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new TransformerAlias(AttainmentNumberResult::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     * @return AttainmentNumberResult
     */
    public function process(\DateTimeInterface $datetime, string $firstName, string $middleName, string $lastName)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
