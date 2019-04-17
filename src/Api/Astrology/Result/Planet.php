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
    public const PLANET_SUN = 0;
    public const PLANET_MOON = 1;
    public const PLANET_MERCURY = 2;
    public const PLANET_VENUS = 3;
    public const PLANET_MARS = 4;
    public const PLANET_JUPITER = 5;
    public const PLANET_SATURN = 6;
    public const PLANET_RAHU = 10;
    public const PLANET_KETU = 12;
    public const PLANET_ASCENDANT = 14;

    public static $arPlanet = [0 => "Sun", 1 => "Moon", 2 => "Mercury", 3 => "Venus", 4 => "Mars", 5 => "Jupiter", 6 => "Saturn", 10 => "Rahu", 12 => "Ketu", 14 => "Ascendant"];

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
     * @param array $data Planet details
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
     * @return boolian 
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
