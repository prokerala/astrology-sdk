<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class AgeNumber
{
    private string $name;

    private string $age;

    private ?int $number;

    private string $description;

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
