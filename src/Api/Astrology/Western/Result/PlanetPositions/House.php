<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class House implements ResultInterface
{
    use RawResponseTrait;

    private int $id;
    private int $number;
    private HouseCusp $startCusp;
    private HouseCusp $endCusp;

    public function __construct(int $id, int $number, HouseCusp $startCusp, HouseCusp $endCusp)
    {
        $this->id = $id;
        $this->number = $number;
        $this->startCusp = $startCusp;
        $this->endCusp = $endCusp;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getStartCusp(): HouseCusp
    {
        return $this->startCusp;
    }

    public function getEndCusp(): HouseCusp
    {
        return $this->endCusp;
    }
}
