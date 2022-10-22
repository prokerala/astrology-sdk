<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PeriodCycle implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
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
     * @param int $id
     * @param string $title
     * @param Number $birthMonth
     * @param Number $birthNumber
     * @param Number $birthYear
     */
    public function __construct($id, $title, $birthMonth, $birthNumber, $birthYear)
    {
        $this->id = $id;
        $this->title = $title;
        $this->birthMonth = $birthMonth;
        $this->birthNumber = $birthNumber;
        $this->birthYear = $birthYear;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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

    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'birth_month' => $this->birthMonth,
            'birth_day' => $this->birthNumber,
            'birth_year' => $this->birthYear,
        ];
    }
}
