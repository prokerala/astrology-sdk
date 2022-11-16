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

use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam as PapasamyamResult;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

final class Papasamyam
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected string $slug = '/astrology/papasamyam';

    /** @var Transformer<PapasamyamResult> */
    private \Prokerala\Api\Astrology\Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(PapasamyamResult::class);
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location Location details
     * @param \DateTimeInterface $datetime Date and time
     */
    public function process(Location $location, \DateTimeInterface $datetime, string $la = 'en'): PapasamyamResult
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->getAyanamsa(),
            'la' => $la,
        ];

        $apiResponse = $this->apiClient->process($this->slug, $parameters);
        assert($apiResponse instanceof \stdClass);

        return $this->transformer->transform($apiResponse->data);
    }
}
