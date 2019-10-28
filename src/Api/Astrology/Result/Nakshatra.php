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
 * @see     https://github.com/prokerala/astrology
 */

namespace Prokerala\Api\Astrology\Result;

/**
 * Defines Nakshatra
 */
class Nakshatra
{
    public const NAKSHATRA_ASHWINI = 0;
    public const NAKSHATRA_BHARANI = 1;
    public const NAKSHATRA_KRITHIKA = 2;
    public const NAKSHATRA_ROHINI = 3;
    public const NAKSHATRA_MRIGASHIRSHA = 4;
    public const NAKSHATRA_ARDRA = 5;
    public const NAKSHATRA_PUNARVASU = 6;
    public const NAKSHATRA_PUSHYA = 7;
    public const NAKSHATRA_ASHLESHA = 8;
    public const NAKSHATRA_MAGHA = 9;
    public const NAKSHATRA_PURVA_PHALGUNI = 10;
    public const NAKSHATRA_UTTARA_PHALGUNI = 11;
    public const NAKSHATRA_HASTA = 12;
    public const NAKSHATRA_CHITRA = 13;
    public const NAKSHATRA_SWATI = 14;
    public const NAKSHATRA_VISHAKA = 15;
    public const NAKSHATRA_ANURADHA = 16;
    public const NAKSHATRA_JYESHTA = 17;
    public const NAKSHATRA_MOOLA = 18;
    public const NAKSHATRA_PURVA_ASHADHA = 19;
    public const NAKSHATRA_UTTARA_ASHADHA = 20;
    public const NAKSHATRA_SHRAVANA = 21;
    public const NAKSHATRA_DHANISHTA = 22;
    public const NAKSHATRA_SHATABHISHA = 23;
    public const NAKSHATRA_PURVA_BHADRAPADA = 24;
    public const NAKSHATRA_UTTARA_BHADRAPADA = 25;
    public const NAKSHATRA_REVATI = 26;

    public static $arNakshatra = ['Ashwini', 'Bharani', 'Krithika', 'Rohini', 'Mrigashirsha', 'Ardra', 'Punarvasu', 'Pushya', 'Ashlesha', 'Magha', 'Purva Phalguni', 'Uttara Phalguni', 'Hasta', 'Chitra', 'Swati', 'Vishaka', 'Anuradha', 'Jyeshta', 'Moola', 'Purva Ashadha', 'Uttara Ashadha', 'Shravana', 'Dhanishta', 'Shatabhisha', 'Purva Bhadrapada', 'Uttara Bhadrapada', 'Revati'];

    protected $id;
    protected $name;
    protected $start;
    protected $end;
    protected $lord;
    protected $longitude;
    protected $pada;

    /**
     * Init Nakshatra
     *
     * @param object $data nakshatra details
     */
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
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Function returns the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Function returns the starttime
     *
     * @return string in ISO 8601 format
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Function returns the endtime
     *
     * @return string in ISO 8601 format
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Function returns the longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Function returns the lord
     *
     * @return string
     */
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * Function returns the pada
     *
     * @return int
     */
    public function getPada()
    {
        return $this->pada;
    }

    /**
     * Function returns the list
     *
     * @return array
     */
    public function getNakshatraList()
    {
        return self::$arNakshatra;
    }
}
