<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class Essence
{
    private int $characterNumber;
    private int $number;

    private string $description;

    public function __construct(int $characterNumber, int $number, string $description)
    {
        $this->characterNumber = $characterNumber;
        $this->number = $number;
        $this->description = $description;
    }

    public function getCharacterNumber(): int
    {
        return $this->characterNumber;
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
