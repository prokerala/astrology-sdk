<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class SolarReturnChart
{

    /**
     * @var array{list<House>, list<PlanetPosition>, list<PlanetAspect>, list<PlanetAspect>}
     */
    private array $solarDetails;
    /**
     * @var list<PlanetAspect>
     */
    private array $solarNatalAspect;
    private string $solarDatetime;

    /**
     * @param array{list<House>, list<PlanetPosition>, list<PlanetAspect>, list<PlanetAspect>} $solarDetails
     * @param list<PlanetAspect> $solarNatalAspect
     */
    public function __construct(array $solarDetails, array $solarNatalAspect, string $solarDatetime){
        $this->solarDetails = $solarDetails;
        $this->solarNatalAspect = $solarNatalAspect;
        $this->solarDatetime = $solarDatetime;
    }

    /**
     * @return array{list<House>, list<PlanetPosition>,
     *      list<PlanetAspect>, list<PlanetAspect>}
     */
    public function getSolarDetails(): array
    {
        return $this->solarDetails;
    }

    /**
     * @return list<PlanetAspect>
     */
    public function getSolarNatalAspect(): array
    {
        return $this->solarNatalAspect;
    }

    public function getSolarDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->solarDatetime);
    }
}
