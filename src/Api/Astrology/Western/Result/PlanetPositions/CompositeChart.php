<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class CompositeChart implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PlanetAspect[]
     */
    private array $compositeAspects;

    /**
     * @var PlanetPosition[]
     */
    private array $compositeAngles;
    /**
     * @var House[]
     */
    private array $compositeHouses;
    /**
     * @var PlanetPosition[]
     */
    private array $compositePlanetPositions;
    private \DateTimeImmutable $transitDatetime;

    /**
     * @param House[] $compositeHouses
     * @param PlanetPosition[] $compositePlanetPositions
     * @param PlanetPosition[] $compositeAngles
     * @param PlanetAspect[] $compositeAspects
     */
    public function __construct(
        array $compositeHouses,
        array $compositePlanetPositions,
        array $compositeAngles,
        array $compositeAspects,
        string $transitDatetime
    ){
        $this->compositeAspects = $compositeAspects;
        $this->compositeAngles = $compositeAngles;
        $this->compositeHouses = $compositeHouses;
        $this->compositePlanetPositions = $compositePlanetPositions;
        $this->transitDatetime = new \DateTimeImmutable($transitDatetime);
    }

    /**
     * @return PlanetAspect[]
     */
    public function getCompositeAspects(): array
    {
        return $this->compositeAspects;
    }

    /**
     * @return PlanetPosition[]
     */
    public function getCompositeAngles(): array
    {
        return $this->compositeAngles;
    }

    /**
     * @return PlanetPosition[]
     */
    public function getCompositePlanetPositions(): array
    {
        return $this->compositePlanetPositions;
    }

    /**
     * @return House[]
     */
    public function getCompositeHouses(): array
    {
        return $this->compositeHouses;
    }

    public function getTransitDatetime(): \DateTimeImmutable
    {
        return $this->transitDatetime;
    }
}
