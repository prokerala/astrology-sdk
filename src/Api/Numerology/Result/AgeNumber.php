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
     * @var null|int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    public function __construct(string $name, string $age, ?int $number, string $description)
    {
        $this->name = $name;
        $this->age = $age;
        $this->number = $number;
        $this->description = $description;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
