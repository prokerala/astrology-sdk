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
    private array $synastryAspects;

    /**
     * @param PlanetAspect[] $synastryAspects
     */
    public function __construct(array $synastryAspects){
        $this->synastryAspects = $synastryAspects;
    }

    /**
     * @return PlanetAspect[]
     */
    public function getAspects(): array
    {
        return $this->synastryAspects;
    }

}
