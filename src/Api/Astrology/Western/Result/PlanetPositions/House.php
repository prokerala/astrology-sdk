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
    private float $startDegree;
    private float $endDegree;
    /**
     * @var PlanetPosition[]
     */
    private array $planetPositions;

    /**
     * @param PlanetPosition[] $planetPositions
     */

    public function __construct(int $id, int $number, float $startDegree, float $endDegree, array $planetPositions){
        $this->id = $id;
        $this->number = $number;
        $this->startDegree = $startDegree;
        $this->endDegree = $endDegree;
        $this->planetPositions = $planetPositions;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getStartDegree(): float
    {
        return $this->startDegree;
    }

    public function getEndDegree(): float
    {
        return $this->endDegree;
    }

    public function getPlanetPositions(): array
    {
        return $this->planetPositions;
    }
}
