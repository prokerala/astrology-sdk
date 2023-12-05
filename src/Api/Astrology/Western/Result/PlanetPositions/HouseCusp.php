<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\Element\Zodiac;

class HouseCusp
{
    private float $longitude;
    private float $degree;
    private Zodiac $zodiac;
    public function __construct(float $longitude, float $degree, Zodiac $zodiac) {
        $this->longitude = $longitude;
        $this->degree = $degree;
        $this->zodiac = $zodiac;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getDegree(): float
    {
        return $this->degree;
    }

    public function getZodiac(): Zodiac
    {
        return $this->zodiac;
    }
}
