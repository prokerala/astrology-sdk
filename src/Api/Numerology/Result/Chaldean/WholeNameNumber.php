<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

class WholeNameNumber
{
    /** @var string */
    private $name;

    /**
     * @var \Prokerala\Api\Numerology\Result\Number[]
     */
    private $energies;

    /**
     * @param \Prokerala\Api\Numerology\Result\Number[] $energies
     */
    public function __construct(string $name, array $energies)
    {
        $this->name = $name;
        $this->energies = $energies;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \Prokerala\Api\Numerology\Result\Number[]
     */
    public function getEnergies(): array
    {
        return $this->energies;
    }
}
