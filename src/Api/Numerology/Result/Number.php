<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class Number
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ?int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    public function __construct(string $name, ?int $number, string $description)
    {
        $this->name = $name;
        $this->number = $number;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
