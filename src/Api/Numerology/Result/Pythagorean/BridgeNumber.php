<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class BridgeNumber
{
    /**
     * @param Number[] $differences
     */
    public function __construct(private string $name, private array $differences)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Number[]
     */
    public function getDifferences(): array
    {
        return $this->differences;
    }
}
