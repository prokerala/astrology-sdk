<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class Karmic
{
    private int $number;

    private string $description;

    public function __construct(int $number, string $description)
    {
        $this->number = $number;
        $this->description = $description;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

}
