<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Calendar\Result;

final class CalendarDateResult
{
    private int $id;

    private string $name;

    private int $year;

    private int $month;

    private int $day;

    private ?int $leap;

    private ?string $yearName;

    private string $monthName;

    public function __construct(int $id, string $name, int $year, int $month, int $day, ?int $leap, ?string $yearName, string $monthName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->leap = $leap;
        $this->yearName = $yearName;
        $this->monthName = $monthName;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLeap(): ?int
    {
        return $this->leap;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getMonthName(): string
    {
        return $this->monthName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getYearName(): ?string
    {
        return $this->yearName;
    }
}
