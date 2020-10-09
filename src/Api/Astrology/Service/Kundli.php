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
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedKundli as AdvancedKundliResult;
use Prokerala\Api\Astrology\Result\Horoscope\Kundli as KundliResult;
use Prokerala\Common\Api\Client;
use Prokerala\Common\Api\Exception\QuotaExceededException;
use Prokerala\Common\Api\Exception\RateLimitExceededException;
use stdClass;

class Kundli
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'kundli';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;
    /**
     * @var stdClass
     */
    protected $apiResponse;

    /**
     * @param Client $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new stdClass();
    }

    /**
     * Fetch result from API.
     *
     * @param Location $location        location details
     * @param object   $datetime        date and time
     * @param bool     $detailed_report
     *
     * @throws QuotaExceededException
     * @throws RateLimitExceededException
     */
    public function process(Location $location, $datetime, $detailed_report = false)
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $arParameter = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $apiResponse = $this->apiClient->process($slug, $arParameter);
        $this->apiResponse = $apiResponse;

        if ($detailed_report) {
            $this->result = $this->make(AdvancedKundliResult::class, $apiResponse->data);
        } else {
            $this->result = $this->make(KundliResult::class, $apiResponse->data);
        }
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
     * Function returns porutham details.
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
