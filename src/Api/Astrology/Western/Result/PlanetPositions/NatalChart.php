<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class NatalChart
{

    /**
     * @var list<House>
     */
    private array $houses;
    /**
     * @var list<PlanetPosition>
     */
    private array $angles;
    /**
     * @var list<PlanetAspect>
     */
    private array $aspects;
    /**
     * @var list<PlanetAspect>
     */
    private array $declinations;

    /**
     * @param list<House> $houses
     * @param list<PlanetPosition> $angles
     * @param list<PlanetAspect> $aspects
     * @param list<PlanetAspect> $declinations
     */
    public function __construct(array $houses, array $angles, array $aspects, array $declinations){
        $this->houses = $houses;
        $this->angles = $angles;
        $this->aspects = $aspects;
        $this->declinations = $declinations;
    }
    /**
     * @return list<House>
     */
    public function getHouses(): array
    {
        return $this->houses;
    }
    /**
     * @return list<PlanetPosition>
     */
    public function getAngles(): array
    {
        return $this->angles;
    }
    /**
     * @return list<PlanetAspect>
     */
    public function getAspects(): array
    {
        return $this->aspects;
    }
    /**
     * @return list<PlanetAspect>
     */
    public function getDeclinations(): array
    {
        return $this->declinations;
    }
}
