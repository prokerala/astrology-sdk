<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class Essence implements \JsonSerializable
{
    /**
     * @var int
     */
    private $characterNumber;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    /**
     * @param int    $characterNumber
     * @param int    $number
     * @param string $description
     */
    public function __construct($characterNumber, $number, $description)
    {
        $this->characterNumber = $characterNumber;
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

    public function jsonSerialize(): array
    {
        return [
            'character_number' => $this->characterNumber,
            'number' => $this->number,
            'description' => $this->description,
        ];
    }

    public function getCharacterNumber(): int
    {
        return $this->characterNumber;
    }
}
