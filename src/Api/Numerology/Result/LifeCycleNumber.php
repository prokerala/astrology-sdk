<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class LifeCycleNumber
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $cycles;

    /**
     * @param string $name
     * @param AgeNumber[] $cycles
     */
    public function __construct(string $name, array $cycles)
    {
        $this->name = $name;
        $this->cycles = $cycles;
    }

    /**
     * @return string
     */
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
