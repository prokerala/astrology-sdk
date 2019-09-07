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
 * Defines Planet
 *
 **/
class Planet
{
    const PLANET_SUN = 0;
    const PLANET_MOON = 1;
    const PLANET_MERCURY = 2;
    const PLANET_VENUS = 3;
    const PLANET_MARS = 4;
    const PLANET_JUPITER = 5;
    const PLANET_SATURN = 6;
    const PLANET_RAHU = 101;
    const PLANET_KETU = 102;
    const PLANET_ASCENDANT = 100;

    public static $arPlanet = [0 => "Sun", 1 => "Moon", 2 => "Mercury", 3 => "Venus", 4 => "Mars", 5 => "Jupiter", 6 => "Saturn", 101 => "Rahu", 102 => "Ketu", 100 => "Ascendant"];

    protected $id;
    protected $name;
    protected $longitude;
    protected $isReverse;
    protected $position;
    protected $degree;
    protected $rasi;
    protected $rasiLord;

    /**
     * Init Planet
     *
     * @param object $data Planet details
     **/
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
     * Function returns the id
     *
     * @return int
     **/
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Function returns the Retrograde status
     *
     * @return bool
     **/
    public function isRetrograde()
    {
        return $this->isReverse;
    }

    /**
     * Function returns the position
     *
     * @return int
     **/
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Function returns the degree
     *
     * @return string
     **/
    public function getDegree()
    {
        return $this->degree;
    }
    /**
     * Function returns the rasi
     *
     * @return string
     **/
    public function getRasi()
    {
        return $this->rasi;
    }

    /**
     * Function returns the rasi lord
     *
     * @return string
     **/
    public function getRasiLord()
    {
        return $this->rasiLord;
    }

    /**
     * Function returns Planet list
     *
     * @return array
     **/
    public function getPlanetList()
    {
        return self::$arPlanet;
    }
}
