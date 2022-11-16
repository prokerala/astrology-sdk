<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class CharacterValues
{
    private string $character;

    private int $number;

    public function __construct(string $character, int $number)
    {
        $this->character = $character;
        $this->number = $number;
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
