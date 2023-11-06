<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class CompositeChart implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    private array $aspects;

    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[]
     */
    private array $angles;

    /**
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[] $aspects
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[] $angles
     */
    public function __construct(array $aspects, array $angles){
    $this->aspects = $aspects;
    $this->angles = $angles;
}

    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    public function getAspect(): array
    {
        return $this->aspects;
    }

    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetPosition[]
     */
    public function getPlanetPositions(): array
    {
        return $this->angles;
    }
}
