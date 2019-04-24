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
namespace Prokerala\Api\Astrology\Result;

/**
 * Defines Nakshatra
 *
 **/
class Nakshatra
{
    const NAKSHATRA_ASHWINI  = 0;
    const NAKSHATRA_BHARANI = 1;
    const NAKSHATRA_KRITHIKA = 2;
    const NAKSHATRA_ROHINI = 3;
    const NAKSHATRA_MRIGASHIRSHA = 4;
    const NAKSHATRA_ARDRA = 5;
    const NAKSHATRA_PUNARVASU = 6;
    const NAKSHATRA_PUSHYA = 7;
    const NAKSHATRA_ASHLESHA = 8;
    const NAKSHATRA_MAGHA = 9;
    const NAKSHATRA_PURVA_PHALGUNI = 10;
    const NAKSHATRA_UTTARA_PHALGUNI = 11;
    const NAKSHATRA_HASTA = 12;
    const NAKSHATRA_CHITRA = 13;
    const NAKSHATRA_SWATI = 14;
    const NAKSHATRA_VISHAKA = 15;
    const NAKSHATRA_ANURADHA = 16;
    const NAKSHATRA_JYESHTA = 17;
    const NAKSHATRA_MOOLA = 18;
    const NAKSHATRA_PURVA_ASHADHA = 19;
    const NAKSHATRA_UTTARA_ASHADHA = 20;
    const NAKSHATRA_SHRAVANA = 21;
    const NAKSHATRA_DHANISHTA = 22;
    const NAKSHATRA_SHATABHISHA = 23;
    const NAKSHATRA_PURVA_BHADRAPADA = 24;
    const NAKSHATRA_UTTARA_BHADRAPADA = 25;
    const NAKSHATRA_REVATI = 26;

    public static $arNakshatra = ["Ashwini", "Bharani", "Krithika", "Rohini", "Mrigashirsha", "Ardra", "Punarvasu", "Pushya", "Ashlesha", "Magha", "Purva Phalguni", "Uttara Phalguni", "Hasta", "Chitra", "Swati", "Vishaka", "Anuradha", "Jyeshta", "Moola", "Purva Ashadha", "Uttara Ashadha", "Shravana", "Dhanishta", "Shatabhisha", "Purva Bhadrapada", "Uttara Bhadrapada", "Revati"];

    protected $id;
    protected $name;
    protected $start = null;
    protected $end = null;
    protected $lord = null;
    protected $longitude = null;
    protected $pada = null;
    /**
     * Init Nakshatra
     *
     * @param object $data nakshatra details
     **/
    public function __construct($data) 
    {
        $this->id = $data->id;
        $this->name = self::$arNakshatra[$data->id];
        if (property_exists($data, 'start')) {
            $this->start = $data->start;
        }
        if (property_exists($data, 'end')) {
            $this->end = $data->end;
        }
        if (property_exists($data, 'longitude')) {
            $this->longitude = $data->longitude;
        }
        if (property_exists($data, 'lord')) {
            $this->lord = $data->lord;
        }
        if (property_exists($data, 'pada')) {
            $this->pada = $data->pada;
        }
    }

    /**
     * Function returns the name
     *
     * @return string 
     **/
    public function getName() 
    {
        return $this->name;
    }
    /**
     * Function returns the id
     *
     * @return int 
     **/
    public function getId() 
    {
        return $this->id;
    }

    /**
     * Function returns the starttime
     *
     * @return string in ISO 8601 format 
     **/
    public function getStartTime() 
    {
        return $this->start;
    }

    /**
     * Function returns the endtime
     *
     * @return string in ISO 8601 format 
     **/
    public function getEndTime()
    {
        return $this->end;
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
     * Function returns the lord
     *
     * @return string 
     **/
    public function getLord()
    {
        return $this->lord;
    }


    /**
     * Function returns the pada
     *
     * @return int
     **/
    public function getPada()
    {
        return $this->pada;
    }

    /**
     * Function returns the list
     *
     * @return array
     **/
    public function getNakshatraList()
    {
        return self::$arNakshatra;
    }
}