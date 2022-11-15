<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class InclusionNumber
{
    public function __construct(private int $characterNumber, private int $repeatedNumber, private string $description)
    {
    }

    public function getCharacterNumber(): int
    {
        return $this->characterNumber;
    }

    public function getRepeatedNumber(): int
    {
        return $this->repeatedNumber;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
