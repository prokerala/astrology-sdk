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
    ) {
    }

    public function getFirstPlanet()
    {
        return $this->first_planet;
    }
    public function getSecondPlanet()
    {
        return $this->second_planet;
    }
    public function getRelation()
    {
        return $this->relationship;
    }
}
