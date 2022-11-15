<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class Number
{
    public function __construct(private string $name, private ?int $number, private string $description)
    {
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
