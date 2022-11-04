<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class Essence implements JsonSerializable
{
    /**
     * @var int
     */
    private$characterNumber;
    /**
     * @var int
     */
    private $number;
    /**
     * @var string
     */
    private $description;

    /**
     * @param int $characterNumber
     * @param int $number
     * @param string $description
     */
    public function __construct($characterNumber, $number, $description)
    {
        $this->characterNumber = $characterNumber;
        $this->number = $number;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function jsonSerialize(): array
    {
        return [
            'character_number' => $this->characterNumber,
            'number' => $this->number,
            'description' => $this->description
        ];
    }

    /**
     * @return int
     */
    public function getCharacterNumber(): int
    {
        return $this->characterNumber;
    }
}
