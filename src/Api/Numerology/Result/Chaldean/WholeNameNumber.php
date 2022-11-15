<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

class WholeNameNumber
{
    /**
     * @param Number[] $energies
     */
    public function __construct(private string $name, private array $energies)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Number[]
     */
    public function getEnergies(): array
    {
        return $this->energies;
    }
}
