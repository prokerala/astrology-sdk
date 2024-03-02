<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class Inclusion
{
    private int $characterValue;
    private int $repeatedNumberCount;

    private string $description;

    public function __construct(int $characterValue, int $repeatedNumberCount, string $description)
    {
        $this->characterValue = $characterValue;
        $this->repeatedNumberCount = $repeatedNumberCount;
        $this->description = $description;
    }

    public function getCharacterValue(): int
    {
        return $this->characterValue;
    }

    public function getRepeatedNumberCount(): int
    {
        return $this->repeatedNumberCount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
