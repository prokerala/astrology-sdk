<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class InclusionNumber
{
    /**
     * @var int
     */
    private $characterNumber;

    /**
     * @var int
     */
    private $repeatedNumber;

    /**
     * @var string
     */
    private $description;

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
