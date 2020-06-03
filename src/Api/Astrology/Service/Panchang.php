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
use Prokerala\Common\Api\Client;

/**
 * Defines the Panchang
 */
class Panchang
{
    use AstroTrait;

    protected $apiClient;
    protected $slug = 'panchang';
    protected $ayanamsa = 1;

    protected $nakshatra;
    protected $tithi;
    protected $karana;
    protected $yoga;
    protected $week_day;
    protected $input;

    /**
     * @param object $client api client object
     */
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
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
        foreach ($result->response as $res_key => $res_value) {
            $class = $this->getClassName($res_key, true);
            if ($class) {
                if (is_array($res_value)) {
                    foreach ($res_value as $rkey => $rvalue) {
                        $this->{$res_key}[] = $this->make($class, $rvalue, $tz);
                    }
                } else {
                    $this->{$res_key} = $this->make($class, $res_value, $tz);
                }
            } else {
                $this->{$res_key} = $res_value;
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
    public function getVasara()
    {
        return $this->week_day;
    }

    /**
     * Function returns nakshatra details
     *
     * @return object
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * Function returns tithi details
     *
     * @return object
     */
    public function getTithi()
    {
        return $this->tithi;
    }

    /**
     * Function returns karna details
     * @deprecated Use self::getKarana
     * @return object
     */
    public function getKarna()
    {
        return $this->getKarana();
    }

    /**
     * Function returns karna details
     *
     * @return object
     */
    public function getKarana()
    {
        return $this->karana;
    }

    /**
     * Function returns yoga details
     *
     * @return object
     */
    public function getYoga()
    {
        return $this->yoga;
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
