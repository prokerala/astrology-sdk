<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class TransitChart implements ResultInterface
{
    use RawResponseTrait;

    private TransitDetails $transitDetails;
    /**
     * @var PlanetAspect[]
     */
    private array $transitNatalAspect;
    private string $transitDatetime;

    /**
     * @param PlanetAspect[] $transitNatalAspects
     */
    public function __construct(TransitDetails $transitDetails, array $transitNatalAspects, string $transitDatetime){
        $this->transitDetails = $transitDetails;
        $this->transitNatalAspect = $transitNatalAspects;
        $this->transitDatetime = $transitDatetime;
    }

    public function getTransitDetails(): TransitDetails
    {
        return $this->transitDetails;
    }

    /**
     * @return PlanetAspect[]
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
