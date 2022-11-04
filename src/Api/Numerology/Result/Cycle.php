<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class Cycle
{
    /**
     * @var string
     */
    private $character;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    /**
     * @param string $character
     * @param int    $number
     * @param string $description
     */
    public function __construct($character, $number, $description)
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
