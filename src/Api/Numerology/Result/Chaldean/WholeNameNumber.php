<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Numerology\Result\Number;


class WholeNameNumber
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var \Prokerala\Api\Numerology\Result\Number[]
     */
    private array $energies;

    /**
     * @param string $name
     * @param \Prokerala\Api\Numerology\Result\Number[] $energies
     */
    public function __construct(string $name, array $energies)
    {
        $this->name = $name;
        $this->energies = $energies;
    }

    /**
     * @return string
     */
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
