<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class Cycle
{
    private string $character;

    private int $number;

    private string $description;

    public function __construct(string $character, int $number, string $description)
    {
        $this->character = $character;
        $this->number = $number;
        $this->description = $description;
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
