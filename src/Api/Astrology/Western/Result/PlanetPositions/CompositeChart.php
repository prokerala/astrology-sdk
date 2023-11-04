<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class CompositeChart
{

    /**
     * @var list<PlanetAspect>
     */
    private array $aspects;

    /**
     * @var list<PlanetPosition>
     */
    private array $planetPositions;

    /**
     * @param list<PlanetAspect> $aspects
     * @param list<PlanetPosition> $planetPositions
     */
    public function __construct(array $aspects, array $planetPositions){
    $this->aspects = $aspects;
    $this->planetPositions = $planetPositions;
}

    /**
     * @return list<PlanetAspect>
     */
    public function getAspect(): array
    {
        return $this->aspects;
    }

    /**
     * @return list<PlanetPosition>
     */
    public function getPlanetPositions(): array
    {
        return $this->planetPositions;
    }
}
