<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

class ProgressionChart
{

    /**
     * @var array{list<House>, list<PlanetPosition>, list<PlanetAspect>, list<PlanetAspect>}
     */
    private array $progressionDetails;
    /**
     * @var list<PlanetAspect>
     */
    private array $progressionNatalAspect;
    private string $progressionDatetime;

    /**
     * @param array{list<House>, list<PlanetPosition>, list<PlanetAspect>, list<PlanetAspect>} $progressionDetails
     * @param list<PlanetAspect> $progressionNatalAspect
     */
    public function __construct(array $progressionDetails, array $progressionNatalAspect, string $progressionDatetime){
        $this->progressionDetails = $progressionDetails;
        $this->progressionNatalAspect = $progressionNatalAspect;
        $this->progressionDatetime = $progressionDatetime;
    }

    /**
     * @return array{list<House>, list<PlanetPosition>,
     *      list<PlanetAspect>, list<PlanetAspect>}
     */
    public function getProgressionDetails(): array
    {
        return $this->progressionDetails;
    }

    /**
     * @return list<PlanetAspect>
     */
    public function getProgressionNatalAspect(): array
    {
        return $this->progressionNatalAspect;
    }

    public function getProgressionDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->progressionDatetime);
    }
}
