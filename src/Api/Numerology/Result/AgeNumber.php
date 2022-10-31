<?php

namespace Prokerala\Api\Numerology\Result;

class AgeNumber
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $age;

    /**
     * @var ?int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    /**
     * @param string $name
     * @param string $age
     * @param int|null $number
     * @param string $description
     */
    public function __construct (string $name, string $age, ?int $number, string $description) {
        $this->name = $name;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
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
