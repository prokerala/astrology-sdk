<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result;

/**
 * Defines Vasara.
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

    protected $id;

    private static $arVasara = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get week day.
     *
     * @return string
     */
    public function getName()
    {
        return self::$arVasara[$this->id];
    }

    /**
     * Get week day id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get week day list.
     *
     * @return array
     */
    public function getVasaraList()
    {
        return self::$arVasara;
    }
}
