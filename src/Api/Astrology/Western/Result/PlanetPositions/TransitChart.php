<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class TransitChart
{

    /**
     * @var array{houses:list<House>, angles:list<PlanetPosition>,
     *      aspects:list<PlanetAspect>, declinations:list<PlanetAspect>}
     */
    private array $transitDetails;
    /**
     * @var list<PlanetAspect>
     */
    private array $transitNatalAspect;
    private string $transitDatetime;

    public function __construct(array $transitDetails, array $transitNatalAspect, string $transitDatetime){
        $this->transitDetails = $transitDetails;
        $this->transitNatalAspect = $transitNatalAspect;
        $this->transitDatetime = $transitDatetime;
    }

    /**
     * @return array{list<House>, list<PlanetPosition>,
     *      list<PlanetAspect>, list<PlanetAspect>}
     */
    public function getTransitDetails(): array
    {
        return $this->transitDetails;
    }

    /**
     * @return list<PlanetAspect>
     */
    public function getTransitNatalAspect(): array
    {
        return $this->transitNatalAspect;
    }

    public function getTransitDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->transitDatetime);
    }
}
