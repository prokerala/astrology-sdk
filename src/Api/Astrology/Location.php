<?php
/**
 * (c) Ennexa Technologies <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @package  Astrology
 * @author   Ennexa <api@prokerala.com>
 * @license  MIT License (https://api.prokerala.com/license.txt)
 * @version  GIT: 1.0
 * @link     https://github.com/prokerala/astrology-sdk
 * @access   public
 **/
namespace Prokerala\Api\Astrology;

/**
 * Defines
 *
 **/
class Location
{
    protected $latitude;
    protected $longitude;
    protected $altitude;
    /**
     * Init Location
     *
     * @param array $data nakshatra details
     **/
    public function __construct($latitude, $longitude, $altitude = 0) 
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
    }

    /**
     * Function returns the latitude
     *
     * @return float 
     **/
    public function getLatitude() 
    {
        return $this->latitude;
    }
    
    /**
     * Function returns the longitude
     *
     * @return float 
     **/
    public function getLongitude() 
    {
        return $this->longitude;
    }
    /**
     * Function returns the altitude
     *
     * @return float 
     **/
    public function getAltitude() 
    {
        return $this->altitude;
    }
    /**
     * Function returns the cooridantes
     *
     * @return array 
     **/
    public function getCoordinates() 
    {
        return "$this->latitude,$this->longitude";
    }
}