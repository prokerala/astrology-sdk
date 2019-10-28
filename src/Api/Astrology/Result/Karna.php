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
 * Defines Karna
 */
class Karna
{
    public const KARANA_BAVA = 0;
    public const KARANA_BALAVA = 1;
    public const KARANA_KAULAVA = 2;
    public const KARANA_TAITILA = 3;
    public const KARANA_GARIJA = 4;
    public const KARANA_VANIJA = 5;
    public const KARANA_VISHTI = 6;
    public const KARANA_KIMSTUGHNA = 7;
    public const KARANA_SHAKUNI = 8;
    public const KARANA_CHATUSHPADA = 9;
    public const KARANA_NAGA = 10;

    public static $arKarna = ['Bava', 'Balava', 'Kaulava', 'Taitila', 'Garija', 'Vanija', 'Vishti', 'Shakuni', 'Chatushpada', 'Naga', 'Kimstughna'];

    protected $id;
    protected $name;
    protected $start;
    protected $end;

    /**
     * Init Karna
     *
     * @param object $data karna details
     */
    public function __construct($data)
    {
        $this->id = $data->id;
        $this->name = self::$arKarna[$data->id];
        $this->start = $data->start;
        $this->end = $data->end;
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
     * Function returns Karna list
     *
     * @return array
     */
    public function getKarnaList()
    {
        return self::$arKarna;
    }
}
