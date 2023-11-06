<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class ProgressionDetails implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\House[]
     */
    private array $houses;
    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[]
     */
    private array $angles;
    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    private array $aspects;
    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    private array $declinations;

    /**
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\House[] $houses
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[] $angles
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[] $aspects
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[] $declinations
     */
    public function __construct(array $houses, array $angles, array $aspects, array $declinations){
        $this->houses = $houses;
        $this->angles = $angles;
        $this->aspects = $aspects;
        $this->declinations = $declinations;
    }
    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\House[]
     */
    public function getHouses(): array
    {
        return $this->houses;
    }
    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[]
     */
    public function getAngles(): array
    {
        return $this->angles;
    }
    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    public function getAspects(): array
    {
        return $this->aspects;
    }
    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
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
