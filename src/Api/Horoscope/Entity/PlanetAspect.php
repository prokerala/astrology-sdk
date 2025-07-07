<?php



namespace Prokerala\Api\Horoscope\Entity;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\Planet;

class PlanetAspect implements ResultInterface
{
    use RawResponseTrait;

    private Planet $planetOne;
    private Planet $planetTwo;
    private Aspect $aspect;
    private string $effect;

    public function __construct(Planet $planetOne, Planet $planetTwo, Aspect $aspect, string $effect)
    {
        $this->planetOne = $planetOne;
        $this->planetTwo = $planetTwo;
        $this->aspect = $aspect;
        $this->effect = $effect;
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
    public function getEffect(): string
    {
        return $this->effect;
    }
}

