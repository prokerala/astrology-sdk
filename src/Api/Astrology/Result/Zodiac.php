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
 * Defines Zodiac
 */
class Zodiac
{
    public const RASI_MESHA = 0;
    public const RASI_VRISHABHA = 1;
    public const RASI_MITHUNA = 2;
    public const RASI_KARKA = 3;
    public const RASI_SIMHA = 4;
    public const RASI_KANYA = 5;
    public const RASI_TULA = 6;
    public const RASI_VRISCHIKA = 7;
    public const RASI_DHANU = 8;
    public const RASI_MAKARA = 9;
    public const RASI_KUMBHA = 10;
    public const RASI_MEENA = 11;

    private static $arZodiac = [
        'Mesha',
        'Vrishabha',
        'Mithuna',
        'Karka',
        'Simha',
        'Kanya',
        'Tula',
        'Vrischika',
        'Dhanu',
        'Makara',
        'Kumbha',
        'Meena',
    ];

    protected $id;
    protected $name;
    protected $longitude;
    protected $lord;
    protected $start;
    protected $end;

    /**
     * Create Zodiac Sign
     *
     * @param object $data Zodiac details
     */
    public function __construct($data)
    {
        $this->id = $data->id;
        $this->name = self::$arZodiac[$data->id];
        if (property_exists($data, 'longitude')) {
            $this->longitude = $data->longitude;
        }
        if (property_exists($data, 'lord')) {
            $this->lord = $data->lord;
        }

        if (property_exists($data, 'start')) {
            $this->start = $data->start;
        }

        if (property_exists($data, 'end')) {
            $this->end = $data->end;
        }
    }

    /**
     * Get sign name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get sign id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get Rasi lord
     *
     * @return string
     */
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * Get zodiac sign start time in ISO 8601 format
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Get zodiac sign end time in ISO 8601 format
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Get full zodiac sign list
     *
     * @return array
     */
    public function getZodiacList()
    {
        return self::$arZodiac;
    }
}
