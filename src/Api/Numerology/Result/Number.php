<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class Number implements JsonSerializable
{
    /**
     * @var ?int $number
     */
    private $number;
    /**
     * @var string $description
     */
    private $description;
    /**
     * @param ?int $number
     * @param string $description
     */
    public function __construct ($number, $description) {
        $this->number = $number;
        $this->description = $description;
    }

    /**
     * @return ?int
     */
    public function getNumber(): ?int
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
            'number' => $this->number,
            'description' => $this->description
        ];
    }
}
