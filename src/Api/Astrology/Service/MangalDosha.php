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
use Prokerala\Api\Astrology\Result\Horoscope\MangalDosha as MangalDoshaResult;
use Prokerala\Api\Astrology\Result\Horoscope\AdvancedMangalDosha as AdvancedMangalDoshaResult;


use Prokerala\Common\Api\Client;

/**
 * Defines the MangalDosha
 */
class MangalDosha
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'mangal-dosha';
    protected $ayanamsa = 1;

    protected $result;
    protected $input;

    /**
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new \stdClass();
    }

    /**
     * Fetch result from API
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     */
    public function process(Location $location, $datetime, $detailed_report = false)
    {
        $slug = $this->slug;
        if ($detailed_report) {
            $slug .= '/advanced';
        }

        $parameters = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $apiResponse = $this->apiClient->doGet($slug, $parameters);
        $this->apiResponse = $apiResponse;
        if ($detailed_report) {
            $this->result = $this->make(AdvancedMangalDoshaResult::class, $apiResponse->data);
        } else {
            $this->result = $this->make(MangalDoshaResult::class, $apiResponse->data);
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
     * Set ayanamsa system
     *
     * @param object $client   client class object
     * @param int  $ayanamsa
     */
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Function returns mangaldosha details
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
     * @return \stdClass
     */
    public function getRawResponse()
    {
        return $this->apiResponse;
    }

    /**
     * Get the input as parsed by the API server
     *
     * @return \stdClass
     */
    public function getParsedInput()
    {
        return $this->input;
    }
}
