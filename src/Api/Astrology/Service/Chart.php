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
use Prokerala\Api\Astrology\Result\Horoscope\Chart as ChartResult;
use Prokerala\Common\Api\Client;
use stdClass;

/**
 * Defines the Chart
 */
class Chart
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'chart';
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
     * @param string $chart_type
     * @return void
     * @throws \Prokerala\Common\Api\Exception\QuotaExceededException
     * @throws \Prokerala\Common\Api\Exception\RateLimitExceededException
     */
    public function process(Location $location, $datetime, string $chart_type)
    {

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
            'chart_type' => $chart_type,
        ];

        $apiResponse = $this->apiClient->doGet($this->slug, $parameters);
        $this->apiResponse = $apiResponse->data;
        $this->result = $this->make(ChartResult::class, $apiResponse->data);
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
     * Function returns Chart details
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
