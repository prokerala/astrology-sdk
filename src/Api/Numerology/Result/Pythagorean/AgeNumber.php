<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class AgeNumber
{
    public function __construct(private string $name, private string $age, private ?int $number, private string $description)
    {
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
