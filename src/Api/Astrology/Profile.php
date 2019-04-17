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
namespace Prokerala\Api\Astrology;

use \Prokerala\Api\Astrology\Location;

/**
 * Defines Profile
 *
 **/
class Profile
{
    /**
     * Init Profile
     *
     * @param array $data nakshatra details
     **/
    public function __construct(Location $location, $datetime) 
    {
        $this->location = $location;
        $this->datetime = $datetime;
    }

    /**
     * Function returns the datetime
     *
     * @return object 
     **/
    public function getDatetime() 
    {
        return $this->datetime;
    }
    
    /**
     * Function returns the location
     *
     * @return object 
     **/
    public function getLocation() 
    {
        return $this->location;
    }
}