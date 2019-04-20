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
    const YOGA_VISHKAMBHA = 0;
    const YOGA_PRITHI = 1;
    const YOGA_AYUSHMAN = 2;
    const YOGA_SAUBHAGYA = 3;
    const YOGA_SOBHANA = 4;
    const YOGA_ATIGANDA = 5;
    const YOGA_SUKARMAN = 6;
    const YOGA_DHRITHI = 7;
    const YOGA_SOOLA = 8;
    const YOGA_GANDA = 9;
    const YOGA_VRIDHI = 10;
    const YOGA_DHRUVA = 11;
    const YOGA_VYAGHATA = 12;
    const YOGA_HARSHANA = 13;
    const YOGA_VAJRA = 14;
    const YOGA_SIDDHI = 15;
    const YOGA_VYATIPATA = 16;
    const YOGA_VARIYAN = 17;
    const YOGA_PARIGHA = 18;
    const YOGA_SIVA = 19;
    const YOGA_SIDDHA = 20;
    const YOGA_SADHYA = 21;
    const YOGA_SUBHA = 22;
    const YOGA_SUKLA = 23;
    const YOGA_BRAHMA = 24;
    const YOGA_INDRA = 25;
    const YOGA_VAIDHRUTHI = 26;

    public static $arYoga = ["Vishkambha", "Prithi", "Ayushman", "Saubhagya", "Sobhana", "Atiganda", "Sukarman", "Dhrithi", "Soola", "Ganda", "Vridhi", "Dhruva", "Vyaghata", "Harshana", "Vajra", "Siddhi", "Vyatipata", "Variyan", "Parigha", "Siva", "Siddha", "Sadhya", "Subha", "Sukla", "Brahma", "Indra", "Vaidhruthi"];

    protected $id;
    protected $name;
    protected $start;
    protected $end;
    /**
     * Init Yoga
     *
     * @param object $data Yoga details
     **/
    public function __construct($data) 
    {
        $this->id = $data->id;
        $this->name = self::$arYoga[$data->id];
        $this->start = $data->start;
        $this->end = $data->end;
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
     * Function returns Yoga list
     *
     * @return array
     **/
    public function getYogaList()
    {
        return self::$arYoga;
    }
}