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

    private static $arNakshatra = [
        'Ashwini', 'Bharani', 'Krithika', 'Rohini',
        'Mrigashirsha', 'Ardra', 'Punarvasu', 'Pushya',
        'Ashlesha', 'Magha', 'Purva Phalguni', 'Uttara Phalguni',
        'Hasta', 'Chitra', 'Swati', 'Vishaka', 'Anuradha',
        'Jyeshta', 'Moola', 'Purva Ashadha', 'Uttara Ashadha',
        'Shravana', 'Dhanishta', 'Shatabhisha', 'Purva Bhadrapada',
        'Uttara Bhadrapada', 'Revati',
    ];

    protected $id;
    protected $start;
    protected $end;
    protected $lord;
    protected $longitude;
    protected $pada;

    public function __construct($id, ?\DateTimeImmutable $start = null, ?\DateTimeImmutable $end = null, $longitude = null, $lord = null, $pada = null)
    {
        $this->id = $id;
        $this->start = $start;
        $this->end = $end;
        $this->longitude = $longitude;
        $this->lord = $lord;
        $this->pada = $pada;
    }

    /**
     * Get nakshatra name
     *
     * @return string
     */
    public function getName()
    {
        return self::$arNakshatra[$this->id];
    }

    /**
     * Get nakshatra id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get nakshatra start time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Get nakshatra end time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Get the longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get the nakshatra lord
     *
     * @return string
     */
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * Get the nakshatra pada
     *
     * @return int
     */
    public function getPada()
    {
        return $this->pada;
    }

    /**
     * Get complete nakshatra list
     *
     * @return string[]
     */
    public function getNakshatraList()
    {
        return self::$arNakshatra;
    }
}
