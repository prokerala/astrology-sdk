<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Numerology\Result\Number;

class WholeNameNumber
{
    /**
     * @var ?int
     */
    private $social_energy;
    /**
    * @var ?int
    */
    private $soul_energy;
    /**
    * @var ?int
     */
    private $domestic_energy;

    /**
     * @param int|null $social_energy
     * @param int|null $soul_energy
     * @param int|null $domestic_energy
     */
    public function __construct(?int $social_energy, ?int $soul_energy, ?int $domestic_energy)
    {
        $this->social_energy = $social_energy;
        $this->soul_energy = $soul_energy;
        $this->domestic_energy = $domestic_energy;
    }

    /**
     * @return int|null
     */
    public function getSocialEnergy(): ?int
    {
        return $this->social_energy;
    }

    /**
     * @return int|null
     */
    public function getSoulEnergy(): ?int
    {
        return $this->soul_energy;
    }

    /**
     * @return int|null
     */
    public function getDomesticEnergy(): ?int
    {
        return $this->domestic_energy;
    }


}
