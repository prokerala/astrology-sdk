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
 * Defines Vasara
 */
class Vasara
{
    public const VASARA_MONDAY = 0;
    public const VASARA_TUESDAY = 1;
    public const VASARA_WEDNESDAY = 2;
    public const VASARA_THURSDAY = 3;
    public const VASARA_FRIDAY = 4;
    public const VASARA_SATURDAY = 5;
    public const VASARA_SUNDAY = 6;

    private static $arVasara = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get week day
     *
     * @return string
     */
    public function getName()
    {
        return self::$arVasara[$this->id];
    }

    /**
     * Get week day id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get week day list
     *
     * @return array
     */
    public function getVasaraList()
    {
        return self::$arVasara;
    }
}
