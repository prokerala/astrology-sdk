<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\PlanetRelationship;

use Prokerala\Api\Astrology\Result\Element\Planet;

class PlanetRelation
{
    public function __construct(
        private Planet $first_planet,
        private Planet $second_planet,
        private string $relationship,
    ) {}

    public function getFirstPlanet(): Planet
    {
        return $this->first_planet;
    }

    public function getSecondPlanet(): Planet
    {
        return $this->second_planet;
    }

    public function getRelation(): string
    {
        return $this->relationship;
    }
}
