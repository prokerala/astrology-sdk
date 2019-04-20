<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @package  Astrology
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @link     https://github.com/prokerala/astrology
 * @access   public
 **/
namespace Prokerala\Api\Astrology\Service;

use \Prokerala\Api\Astrology\Location;
use \Prokerala\Api\Astrology\AstroTrait;
use \Prokerala\Common\Api\Client;
use \Prokerala\Common\Api\Exception\InvalidArgumentException;
use \Prokerala\Common\Api\Exception\QuotaExceededException;
use \Prokerala\Common\Api\Exception\RateLimitExceededException;

/**
 * Defines the Panchang
 *
 **/
class PlanetPosition
{
    use AstroTrait;

    protected $apiClient = null;
    protected $slug = "planet-position";
    protected $ayanamsa = 1;

    public $input = null;
    public $planet_positions = null;

    /**
     * Function returns panchang details
     *
     * @param  object $client api client object
     * @return void
     **/
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
    }

    /**
     * Function returns panchang details
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     **/
    public function process(Location $location, $datetime)
    {
        $classNameSpace = "\\Prokerala\\Api\\Astrology\\Result\\";

        $arParameter = [
            'datetime' => $datetime->format("Y-m-d\TH:i:s\Z"),
            'coordinates' => $location->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];

        $result = $this->apiClient->doGet($this->slug, $arParameter);
        
        $this->input = $result->request;
        foreach ($result->response as $res_key => $res_value) {
            if (isset($this->arClassNameMap[$res_key])) {
                if (is_array($res_value)) {
                    foreach ($res_value as $rkey => $rvalue) {
                        $class = $classNameSpace.$this->arClassNameMap[$res_key];
                        $this->$res_key[] = new $class($rvalue);
                    }
                } else {
                    $class = $classNameSpace.$this->arClassNameMap[$res_key];
                    $this->$res_key = new $class($res_value);
                }
                
            } else {
                $this->$res_key = $res_value;
            }
        }
        return $this;
    }

    /**
     * Function returns panchang details
     *
     * @param  object $client client class object
     * @return void
     **/
    public function setApiClient(Client $client)
    {
        $this->apiClient = $client;
    }
    /**
     * Function returns panchang details
     *
     * @param  object $client client class object
     * @return void
     **/
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Function returns input details
     *
     * @return object
     **/
    public function getPlanets()
    {
        return $this->planet_positions;
    }
    
    /**
     * Function returns input details
     *
     * @return object
     **/
    public function getInput()
    {
        return $this->input;
    }
}