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
 * Defines
 *
 **/
class Yoga
{
    public const YOGA_VISHKAMBHA = 0;
    public const YOGA_PRITHI = 1;
    public const YOGA_AYUSHMAN = 2;
    public const YOGA_SAUBHAGYA = 3;
    public const YOGA_SOBHANA = 4;
    public const YOGA_ATIGANDA = 5;
    public const YOGA_SUKARMAN = 6;
    public const YOGA_DHRITHI = 7;
    public const YOGA_SOOLA = 8;
    public const YOGA_GANDA = 9;
    public const YOGA_VRIDHI = 10;
    public const YOGA_DHRUVA = 11;
    public const YOGA_VYAGHATA = 12;
    public const YOGA_HARSHANA = 13;
    public const YOGA_VAJRA = 14;
    public const YOGA_SIDDHI = 15;
    public const YOGA_VYATIPATA = 16;
    public const YOGA_VARIYAN = 17;
    public const YOGA_PARIGHA = 18;
    public const YOGA_SIVA = 19;
    public const YOGA_SIDDHA = 20;
    public const YOGA_SADHYA = 21;
    public const YOGA_SUBHA = 22;
    public const YOGA_SUKLA = 23;
    public const YOGA_BRAHMA = 24;
    public const YOGA_INDRA = 25;
    public const YOGA_VAIDHRUTHI = 26;

    public static $arYoga = ["Vishkambha", "Prithi", "Ayushman", "Saubhagya", "Sobhana", "Atiganda", "Sukarman", "Dhrithi", "Soola", "Ganda", "Vridhi", "Dhruva", "Vyaghata", "Harshana", "Vajra", "Siddhi", "Vyatipata", "Variyan", "Parigha", "Siva", "Siddha", "Sadhya", "Subha", "Sukla", "Brahma", "Indra", "Vaidhruthi"];

    protected $id;
    protected $name;
    protected $startTime;
    protected $endTime;
    /**
     * Init Yoga
     *
     * @param array $data Yoga details
     **/
    public function __construct($data) 
    {
        $this->id = $data->id;
        $this->name = self::$arYoga[$data->id];
        $this->startTime = $data->start;
        $this->endTime = $data->end;
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
        return $this->startTime;
    }

    /**
     * Function returns the endtime
     *
     * @return string in ISO 8601 format 
     **/
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Function returns Yoga list
     *
     * @return array
     **/
    public function getYogaList()
    {
        return self::$arYoga;
    }
}