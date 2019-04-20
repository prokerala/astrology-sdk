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
use \Prokerala\Api\Astrology\Profile;
use \Prokerala\Api\Astrology\AstroTrait;
use \Prokerala\Common\Api\Client;
use \Prokerala\Common\Api\Exception\InvalidArgumentException;
use \Prokerala\Common\Api\Exception\QuotaExceededException;
use \Prokerala\Common\Api\Exception\RateLimitExceededException;

/**
 * Defines the KundliMatch
 *
 **/
class KundliMatch
{
    use AstroTrait;

    protected $apiClient = null;
    protected $slug = "kundli-matching";
    protected $ayanamsa = 1;

    public $nakshatra = null;
    public $tithi = null;
    public $karna = null;
    public $yoga = null;
    public $vasara = null;
    public $result = null;
    public $input = null;

    /**
     * Function returns KundliMatch details
     *
     * @param  object $client api client object
     * @return void
     **/
    public function __construct(Client $client)
    {
        $this->apiClient = $client;
        $this->result = new \stdClass;

    }

    /**
     * Function returns KundliMatch details
     *
     * @param  object $location location details
     * @param  object $datetime date and time
     * @return array
     **/
    public function process(Profile $bride_profile, Profile $groom_profile)
    {
        $classNameSpace = "\\Prokerala\\Api\\Astrology\\Result\\";

        $arParameter = [
            'bride_dob' => $bride_profile->getDatetime()->format("Y-m-d\TH:i:s\Z"),
            'bride_coordinates' => $bride_profile->getLocation()->getCoordinates(),
            'bridegroom_dob' => $groom_profile->getDatetime()->format("Y-m-d\TH:i:s\Z"),
            'bridegroom_coordinates' => $groom_profile->getLocation()->getCoordinates(),
            'ayanamsa' => $this->ayanamsa,
        ];
        $result = $this->apiClient->doGet($this->slug, $arParameter);
        
        $this->input = $result->request;
        
        foreach ($result->response as $res_key => $res_value) {
            if (isset($this->arClassNameMap[$res_key]) || count((array)$res_value) > 1) {
                if (is_object($res_value) && count((array)$res_value) > 1) {
                    foreach ((array)$res_value as $res_key1 => $res_value1) {
                        if (isset($this->arClassNameMap[$res_key1])) {
                            if (is_array($res_value1)) {
                                foreach ($res_value1 as $rrkey => $rrvalue) {
                                    $class = $classNameSpace.$this->arClassNameMap[$res_key1];
                                    $this->result->$res_key->$res_key1[] = new $class($rrvalue);
                                }
                            } else {
                                $class = $classNameSpace.$this->arClassNameMap[$res_key1];
                                $this->result->$res_key->$res_key1 = new $class($res_value1);
                            }
                        } else {
                            if (!property_exists($this->result, $res_key)) {
                                $this->result->$res_key = new \stdClass;
                            }
                            $this->result->$res_key->$res_key1 = $res_value1;
                        }
                    }
                } else {
                    if (is_array($res_value)) {
                        foreach ($res_value as $rkey => $rvalue) {
                            $class = $classNameSpace.$this->arClassNameMap[$res_key];
                            $this->result->$res_key[] = new $class($rvalue);
                        }
                    } else {
                        $class = $classNameSpace.$this->arClassNameMap[$res_key];
                        $this->result->$res_key = new $class($res_value);
                    }
                }
            } else {
                $this->result->$res_key = $res_value;
            }
        }
      
        return $this;
    }

    /**
     * Function returns formated details
     *
     * @param  object $client client class object
     * @return void
     **/
    public function formatOutput($response)
    {
        $classNameSpace = "\\Prokerala\\Api\\Astrology\\Result\\";

         foreach ($response as $res_key => $res_value) {
            if (count((array)$res_value) > 1) {
                $this->formatOutput(((array)$res_value));
            }
            if (isset($this->arClassNameMap[$res_key])) {

                if (is_array($res_value)) {
                    foreach ($res_value as $rkey => $rvalue) {
                        $class = $classNameSpace.$this->arClassNameMap[$res_key];
                        $this->result->$res_key[] = new $class($rvalue);
                    }
                } else {
                    $class = $classNameSpace.$this->arClassNameMap[$res_key];
                    $this->result->$res_key = new $class($res_value);
                }
                
            } else {
                $this->result->$res_key = $res_value;
            }
        }
        return $this->result;
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
     * Function returns vasara details
     *
     * @return object
     **/
    public function getResult()
    {
        return $this->result;
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