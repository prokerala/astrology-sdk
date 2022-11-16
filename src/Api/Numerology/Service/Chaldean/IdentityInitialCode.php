<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Numerology\Service\Chaldean;

use Prokerala\Api\Astrology\Transformer;
use Prokerala\Api\Numerology\Result\Chaldean\IdentityInitialCode as IdentityInitialCodeResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class IdentityInitialCode
{
    use ClientAwareTrait;

    protected string $slug = '/numerology/chaldean/identity-initial-code-number';

    /** @var Transformer<IdentityInitialCodeResult> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(IdentityInitialCodeResult::class);
    }

    /**
     * Fetch result from API.
     *
     *@throws RateLimitExceededException
     **
     * @throws QuotaExceededException
     */
    public function process(string $firstName, string $middleName, string $lastName): IdentityInitialCodeResult
    {
        $parameters = [
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
