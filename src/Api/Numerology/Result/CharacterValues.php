<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class CharacterValues
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
     * @param string $character
     * @param int    $number
     */
    public function __construct($character, $number)
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
