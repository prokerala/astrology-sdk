<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SynastryChart implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PlanetAspect[]
     */
    private array $aspects;

    /**
     * @param PlanetAspect[] $aspects
     */
    public function __construct(array $aspects){
        $this->aspects = $aspects;
    }

    /**
     * @return PlanetAspect[]
     */
    public function getAspects(): array
    {
        return $this->aspects;
    }

}
