<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Element;

class Weekday
{
    const MONDAY = 0;
    const TUESDAY = 1;
    const WEDNESDAY = 2;
    const THURSDAY = 3;
    const FRIDAY = 4;
    const SATURDAY = 5;
    const SUNDAY = 6;

    const WEEKDAY_LIST = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    /** @var int */
    protected $id;
    /** @var string */
    private $name;

    /**
     * @param int    $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get week day.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
    public function getWeekdayList()
    {
        return self::WEEKDAY_LIST;
    }
}
