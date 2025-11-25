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

use Prokerala\Api\Astrology\Result\Horoscope\BatchCompatibilityResult;
use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

final class BatchCompatibility
{
    use TimeZoneAwareTrait;

    protected string $slug = '/astrology/batch-compatibility';

    private Transformer $transformer;
    private Client $apiClient;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(BatchCompatibilityResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(array $parameters):BatchCompatibilityResult
    {

        $parameters['profile']['datetime'] = ($parameters['profile']['datetime'])->format('c');
        $parameters['profile']['coordinates'] = ($parameters['profile']['coordinates'])->getCoordinates();

        foreach ($parameters['match_profiles'] as $index => $matchProfile) {
            $date = $matchProfile['datetime']->format('c');
            $coordinates = $matchProfile['coordinates']->getCoordinates();
            $parameters['match_profiles'][$index]['datetime'] = $date;
            $parameters['match_profiles'][$index]['coordinates'] = $coordinates;

        }
        $apiResponse = $this->apiClient->process($this->slug, $parameters,'POST');
        \assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}

