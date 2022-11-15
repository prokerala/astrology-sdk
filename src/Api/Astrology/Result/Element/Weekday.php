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

final class Weekday
{
    public const MONDAY = 0;
    public const TUESDAY = 1;
    public const WEDNESDAY = 2;
    public const THURSDAY = 3;
    public const FRIDAY = 4;
    public const SATURDAY = 5;
    public const SUNDAY = 6;

    public const WEEKDAY_LIST = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    /**
     * @param int    $id
     * @param string $name
     */
    public function __construct(private $id, private $name)
    {
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
     * @return list<string>
     */
    public function getWeekdayList()
    {
        return self::WEEKDAY_LIST;
    }
}
