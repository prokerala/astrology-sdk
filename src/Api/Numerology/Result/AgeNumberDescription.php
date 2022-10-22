<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
class AgeNumberDescription
{
    /**
     * @var string
     */
    private $age;
    /**
     * @var int
     */
    private $number;
    /**
     * @var string
     */
    private $description;

    /**
     * @param string $age
     * @param int $number
     * @param string $description
     */
    public function __construct($age, $number, $description)
    {
        $this->age = $age;
        $this->number = $number;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
