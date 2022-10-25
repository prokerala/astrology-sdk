<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PeriodCycle implements JsonSerializable
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

    /**
     * @return Number
     */
    public function getBirthMonth(): Number
    {
        return $this->birthMonth;
    }

    /**
     * @return Number
     */
    public function getBirthNumber(): Number
    {
        return $this->birthNumber;
    }

    /**
     * @return Number
     */
    public function getBirthYear(): Number
    {
        return $this->birthYear;
    }
}
