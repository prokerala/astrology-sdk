<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class LifeCycleNumber
{
    /**
     * @param AgeNumber[] $cycles
     */
    public function __construct(private string $name, private array $cycles)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AgeNumber[]
     */
    public function getCycles(): array
    {
        return $this->cycles;
    }
}
