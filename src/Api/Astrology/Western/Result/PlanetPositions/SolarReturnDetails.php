<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SolarReturnDetails implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var House[]
     */
    private array $houses;
    /**
     * @var PlanetPosition[]
     */
    private array $planetPositions;
    /**
     * @var PlanetPosition[]
     */
    private array $angles;
    /**
     * @var PlanetAspect[]
     */
    private array $aspects;
    /**
     * @var PlanetAspect[]
     */
    private array $declinations;

    /**
     * @param House[] $houses
     * @param PlanetPosition[] $angles
     * @param PlanetPosition[] $planetPositions
     * @param PlanetAspect[] $aspects
     * @param PlanetAspect[] $declinations
     */
    public function __construct(array $houses, array $planetPositions, array $angles, array $aspects, array $declinations){
        $this->houses = $houses;
        $this->planetPositions = $planetPositions;
        $this->angles = $angles;
        $this->aspects = $aspects;
        $this->declinations = $declinations;
    }
    /**
     * @return House[]
     */
    public function getHouses(): array
    {
        return $this->houses;
    }
    /**
     * @return PlanetPosition[]
     */
    public function getPlanetPositions(): array
    {
        return $this->planetPositions;
    }
    /**
     * @return PlanetPosition[]
     */
    public function getAngles(): array
    {
        return $this->angles;
    }
    /**
     * @return PlanetAspect[]
     */
    public function getAspects(): array
    {
        return $this->aspects;
    }
    /**
     * @return PlanetAspect[]
     */
    public function getDeclinations(): array
    {
        return $this->declinations;
    }

    public function getApiResponse(): ?\stdClass
    {
        return $this->apiResponse;
    }
}
