<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class Synastrychart
{

    /**
     * @var list<PlanetAspect>
     */
    private array $aspects;

    /**
     * @param list<PlanetAspect> $aspects
     */
    public function __construct(array $aspects){
        $this->aspects = $aspects;
    }

    /**
     * @return list<PlanetAspect>
     */
    public function getAspect(): array
    {
        return $this->aspects;
    }

}
