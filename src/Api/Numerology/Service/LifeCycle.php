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
use Prokerala\Api\Numerology\Result\LifeCycleResult;
use Prokerala\Api\Numerology\Result\LifePathResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use Prokerala\Common\Traits\Api\ClientAwareTrait;

final class LifeCycle
{
    use ClientAwareTrait;
    use TimeZoneAwareTrait;

    /** @var string */
    protected $slug = '/numerology/life-cycle-number';

    /** @var TransformerAlias<LifeCycleResult> */
    private $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new TransformerAlias(LifeCycleResult::class);
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
     * @return LifeCycleResult
     */
    public function process(\DateTimeInterface $datetime)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);

        return $this->transformer->transform($apiResponse->data);
    }
}
