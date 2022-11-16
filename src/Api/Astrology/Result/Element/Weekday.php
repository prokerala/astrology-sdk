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

    private int $id;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get week day.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get week day id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get week day list.
     *
     * @return list<string>
     */
    public function getWeekdayList(): array
    {
        return self::WEEKDAY_LIST;
    }
}
