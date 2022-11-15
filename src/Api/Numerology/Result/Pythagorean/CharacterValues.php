<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class CharacterValues
{
    public function __construct(private string $character, private int $number)
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
}
