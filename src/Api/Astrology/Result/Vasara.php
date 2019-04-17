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
 * Defines Vasara
 *
 **/
class Vasara
{
    public const VASARA_MONDAY = 0;
    public const VASARA_TUESDAY = 1;
    public const VASARA_WEDNESDAY = 2;
    public const VASARA_THURSDAY = 3;
    public const VASARA_FRIDAY = 4;
    public const VASARA_SATURDAY = 5;
    public const VASARA_SUNDAY = 6;

    public static $arVasara = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    protected $id;
    protected $name;
    /**
     * Init Vasara
     *
     * @param array $data Vasara details
     **/
    public function __construct($data) 
    {
        $this->id = $data->id;
        $this->name = self::$arVasara[$data->id];
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
     * Function returns Vasara list
     *
     * @return array
     **/
    public function getVasaraList()
    {
        return self::$arVasara;
    }
}