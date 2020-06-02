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
 * Defines Planet
 */
class Planet
{
    public const PLANET_SUN = 0;
    public const PLANET_MOON = 1;
    public const PLANET_MERCURY = 2;
    public const PLANET_VENUS = 3;
    public const PLANET_MARS = 4;
    public const PLANET_JUPITER = 5;
    public const PLANET_SATURN = 6;
    public const PLANET_RAHU = 101;
    public const PLANET_KETU = 102;
    public const PLANET_ASCENDANT = 100;

    private static $arPlanet = [
        0 => 'Sun',
        1 => 'Moon',
        2 => 'Mercury',
        3 => 'Venus',
        4 => 'Mars',
        5 => 'Jupiter',
        6 => 'Saturn',
        101 => 'Rahu',
        102 => 'Ketu',
        100 => 'Ascendant',
    ];

    protected $id;
    protected $name;
    protected $longitude;
    protected $isReverse;
    protected $position;
    protected $degree;
    protected $rasi;
    protected $rasiLord;

    /**
     * Create Planet
     *
     * @internal
     * @param object $data Planet details
     */
    public function __construct($data)
    {
        $this->id = $data->id;
        $this->name = self::$arPlanet[$data->id];
        $this->longitude = $data->longitude;
        $this->isReverse = $data->is_reverse;
        $this->position = $data->position;
        $this->degree = $data->degree;
        if (property_exists($data, 'rasi')) {
            $this->rasi = $data->rasi;
        }
        if (property_exists($data, 'rasi_lord')) {
            $this->rasiLord = $data->rasi_lord;
        }
    }

    /**
     * Get planet name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get planet id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get planet longitude
     *
     * @return int
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Check whether the planet is in retrograde motion
     *
     * @return bool
     */
    public function isRetrograde()
    {
        return $this->isReverse;
    }

    /**
     * Get planet position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get longitude degree
     *
     * @return string
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Get planet rasi
     *
     * @return string
     */
    public function getRasi()
    {
        return $this->rasi;
    }

    /**
     * Get rasi lord for the planet
     *
     * @return string
     */
    public function getRasiLord()
    {
        return $this->rasiLord;
    }

    /**
     * Get complete planet list
     *
     * @return string[]
     */
    public function getPlanetList()
    {
        return self::$arPlanet;
    }
}
