<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Horoscope\Service;

use Prokerala\Api\Astrology\Traits\Service\TimeZoneAwareTrait;
use Prokerala\Api\Astrology\Transformer as TransformerAlias;
use Prokerala\Api\Horoscope\Result\DailyHoroscopeAdvancedResponse;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;

final class DailyPredictionAdvanced
{
    /** @use TimeZoneAwareTrait<DailyHoroscopeAdvancedResponse> */
    use TimeZoneAwareTrait;

    protected string $slug = '/horoscope/daily/advanced';

    /** @var TransformerAlias<DailyHoroscopeAdvancedResponse> */
    private TransformerAlias $transformer;

    private Client $apiClient;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new TransformerAlias(DailyHoroscopeAdvancedResponse::class);
        $this->addDateTimeTransformer($this->transformer);
    }

    /**
     * Fetch result from API.
     *
     * @param \DateTimeInterface $datetime Date and time
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(\DateTimeInterface $datetime, string $sign, string $type): DailyHoroscopeAdvancedResponse
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'sign' => $sign,
            'type' => $type,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
//        print_r($apiResponse); exit;

        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
