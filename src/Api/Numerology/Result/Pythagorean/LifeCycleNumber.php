<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class LifeCycleNumber
{
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $cycles;

    /**
     * @param AgeNumber[] $cycles
     */
    public function __construct(string $name, array $cycles)
    {
        $this->name = $name;
        $this->cycles = $cycles;
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
