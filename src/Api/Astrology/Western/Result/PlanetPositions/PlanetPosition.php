<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\Element\Zodiac;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PlanetPosition implements ResultInterface
{
    use RawResponseTrait;
    private int $id;
    private string $name;
    private float $longitude;
    private bool $isRetrograde;
    private int $position;
    private float $degree;
    private Zodiac $zodiac;

    public function __construct(int $id, string $name, float $longitude, bool $isRetrograde, int $position, float $degree, Zodiac $zodiac)
    {
        $this->id = $id;
        $this->name = $name;
        $this->longitude = $longitude;
        $this->isRetrograde = $isRetrograde;
        $this->position = $position;
        $this->degree = $degree;
        $this->zodiac = $zodiac;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function isRetrograde(): bool
    {
        return $this->isRetrograde;
    }

    public function getPosition(): int
    {
        return $this->position;
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
