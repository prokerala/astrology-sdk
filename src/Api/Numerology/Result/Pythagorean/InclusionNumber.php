<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class InclusionNumber
{
    private int $characterNumber;

    private int $repeatedNumber;

    private string $description;

    public function __construct(int $characterNumber, int $repeatedNumber, string $description)
    {
        $this->characterNumber = $characterNumber;
        $this->repeatedNumber = $repeatedNumber;
        $this->description = $description;
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
