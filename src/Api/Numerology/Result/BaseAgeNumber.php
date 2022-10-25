<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class BaseAgeNumber
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $number;
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $age;

    /**
     * @param string $name
     * @param int $number
     * @param string $description
     * @param string $age
     */
    public function __construct(string $name, int $number, string $description, string $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->number = $number;
        $this->description = $description;
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

    /**
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }

}
