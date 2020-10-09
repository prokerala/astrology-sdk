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

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Panchang\Choghadiya as ChoghadiyaResult;
use Prokerala\Common\Api\Client;
use stdClass;

/**
 * Defines the Choghadiya.
 */
class Choghadiya
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'choghadiya';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;
    /**
     * @var stdClass
     */
    protected $apiResponse;

    /**
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new stdClass();
    }

    /**
     * Fetch result from API.
     *
     * @param object $location location details
     * @param object $datetime date and time
     *
     * @return array
     */
    public function process(Location $location, $datetime)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $apiResponse = $this->apiClient->doGet($this->slug, $parameters);
        $this->apiResponse = $apiResponse->data;

        $this->result = $this->make(ChoghadiyaResult::class, $apiResponse->data);
    }

    /**
     * Set Api Client.
     *
     * @param object $client client class object
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns Choghadiya details.
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get raw response returned by the API.
     *
     * @return stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server.
     *
     * @return stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
