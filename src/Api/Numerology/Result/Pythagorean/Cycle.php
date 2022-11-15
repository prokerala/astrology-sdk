<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class Cycle
{
    public function __construct(private string $character, private int $number, private string $description)
    {
    }

    public function getCharacter(): string
    {
        return $this->character;
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
