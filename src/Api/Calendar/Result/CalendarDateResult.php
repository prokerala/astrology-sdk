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
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $year;
    /**
     * @var int
     */
    private $month;
    /**
     * @var int
     */
    private $day;
    /**
     * @var int|null
     */
    private $leap;
    /**
     * @var string|null
     */
    private $yearName;
    /**
     * @var string
     */
    private $monthName;
    /**
     * @param int $id
     * @param string $name
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int|null $leap
     * @param string|null $yearName
     * @param string $monthName
     */
    public function __construct(int $id, string $name, int $year, int $month, int $day, ?int $leap, ?string $yearName, string $monthName) {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->leap = $leap;
        $this->yearName = $yearName;
        $this->monthName = $monthName;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getLeap(): ?int
    {
        return $this->leap;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return string
     */
    public function getMonthName(): string
    {
        return $this->monthName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return string|null
     */
    public function getYearName(): ?string
    {
        return $this->yearName;
    }
}
