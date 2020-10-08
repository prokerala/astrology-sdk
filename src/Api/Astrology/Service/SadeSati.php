<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology\Service;

use Prokerala\Api\Astrology\AstroTrait;
use Prokerala\Api\Astrology\Location;
use Prokerala\Api\Astrology\Result\Horoscope\SadeSati as SadeSatiResult;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedSadeSati as AdvancedSadeSatiResult;
use Prokerala\Common\Api\Client;
use stdClass;

/**
 * Defines the SadeSati
 */
class SadeSati
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'sade-sati';
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
     * Fetch result from API
     *
     * @param Location $location location details
     * @param object $datetime date and time
     * @param bool $detailed_report
     * @return void
     * @throws \Prokerala\Common\Api\Exception\QuotaExceededException
     * @throws \Prokerala\Common\Api\Exception\RateLimitExceededException
     */
    public function process(Location $location, $datetime, $detailed_report = false)
    {
        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }
        $apiResponse = $this->apiClient->doGet($slug, $parameters);
        $this->apiResponse = $apiResponse->data;

        if ($detailed_report) {
            $this->result = $this->make(AdvancedSadeSatiResult::class, $apiResponse->data);
        } else {
            $this->result = $this->make(SadeSatiResult::class, $apiResponse->data);
        }
    }


    /**
     * Set Api Client
     *
     * @param object $client client class object
     */
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns sade sati details
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get raw response returned by the API
     *
     * @return stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server
     *
     * @return stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
