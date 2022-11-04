<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class PeriodCycle implements \JsonSerializable
{
    /**
     * @var Number
     */
    private $birthMonth;

    /**
     * @var Number
     */
    private $birthNumber;

    /**
     * @var Number
     */
    private $birthYear;

    /**
     * @param Number $birthMonth
     * @param Number $birthNumber
     * @param Number $birthYear
     */
    public function __construct($birthMonth, $birthNumber, $birthYear)
    {
        $this->birthMonth = $birthMonth;
        $this->birthNumber = $birthNumber;
        $this->birthYear = $birthYear;
    }

    public function getBirthMonth(): Number
    {
        return $this->birthMonth;
    }

    public function getBirthNumber(): Number
    {
        return $this->birthNumber;
    }

    public function getBirthYear(): Number
    {
        return $this->birthYear;
    }
}
