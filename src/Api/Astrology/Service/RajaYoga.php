<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Service;

use DateTimeInterface;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\PlanetRelationship\PlanetRelationshipResult;
use Prokerala\Api\Astrology\Result\Horoscope\RajaYogaResponse;
use Prokerala\Api\Astrology\Traits\Service\AyanamsaAwareTrait;
use Prokerala\Api\Astrology\Transformer;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Traits\ClientAwareTrait;

class RajaYoga
{
    use AyanamsaAwareTrait;
    use ClientAwareTrait;

    protected string $slug = '/astrology/raja-yoga';

    /** @var Transformer<RajaYogaResponse> */
    private Transformer $transformer;

    /**
     * @param Client $client Api client
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->transformer = new Transformer(RajaYogaResponse::class);
    }

    /**
     * Fetch result from API.
     *
     * @param Location           $location Location details
     * @param DateTimeInterface $datetime Date and time
     */
    public function process(Location $location, DateTimeInterface $datetime, string $la = 'en'): RajaYogaResponse
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
