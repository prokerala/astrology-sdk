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
use Prokerala\Api\Numerology\Result\Pythagorean\PlanesOfExpression as PlanesOfExpressionResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class PlanesOfExpression
{
    use ClientAwareTrait;

    /** @use TimeZoneAwareTrait<PlanesOfExpressionResult> */
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/planes-of-expression-number';

    /** @var Transformer<PlanesOfExpressionResult> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(PlanesOfExpressionResult::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @return PlanesOfExpressionResult
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     **
     */
    public function process(string $firstName, string $middleName, string $lastName)
    {
        $parameters = [
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
