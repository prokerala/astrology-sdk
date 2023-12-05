<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PlanetAspect implements ResultInterface
{
    use RawResponseTrait;

    private Planet $planetOne;
    private Planet $planetTwo;
    private Aspect $aspect;
    private float $orb;

    public function __construct(Planet $planetOne, Planet $planetTwo, Aspect $aspect, float $orb){
        $this->planetOne = $planetOne;
        $this->planetTwo = $planetTwo;
        $this->aspect = $aspect;
        $this->orb = $orb;
    }

    public function getPlanetOne(): Planet
    {
        return $this->planetOne;
    }

    public function getPlanetTwo(): Planet
    {
        return $this->planetTwo;
    }

    public function getAspect(): Aspect
    {
        return $this->aspect;
    }

    public function getOrb(): float
    {
        return $this->orb;
    }
}
