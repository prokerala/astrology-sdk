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
use Prokerala\Api\Astrology\Result\Planet;
use Prokerala\Api\Astrology\Result\Nakshatra;
use Prokerala\Common\Api\Client;

/**
 * Defines the MangalDosha
 */
class MangalDosha
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'manglik';
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
    public function process(Location $location, $datetime)
    {
        $arParameter = [
            'datetime' => $datetime->format('c'),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];
        $result = $this->apiClient->doGet($this->slug, $arParameter);
        $tz = $location->getTimeZone();

        $this->input = $result->request;

        foreach ($result->response->result as $res_key => $res_value) {
            $class = $this->getClassName($res_key, true);
            if ($class) {
                if ($class === Nakshatra::class) {
                    // TODO: Update API v2 to return only single nakshatra
                    $this->result->nakshatra = $this->make($class, $res_value[0], $tz);
                } elseif (is_array($res_value) || $class === Planet::class) {
                    foreach ($res_value as $res_value1) {
                        $planet = $this->make($class, $res_value1, $tz);
                        $this->result->{$res_key}[$planet->getId()] = $planet;
                    }
                } else {
                    $this->result->{$res_key} = $this->make($class, $res_value, $tz);
                }
            } else {
                $this->result->{$res_key} = $res_value;
            }
        }

        return $this;
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
     * Function returns vasara details
     *
     * @return object
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Get API input
     *
     * @return object
     */
    public function getInput()
    {
        return $this->input;
    }
}
