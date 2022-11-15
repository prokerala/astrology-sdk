<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class BaseAgeNumber
{
    public function __construct(private string $name, private int $number, private string $description, private string $age)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAge(): string
    {
        return $this->age;
    }
}
