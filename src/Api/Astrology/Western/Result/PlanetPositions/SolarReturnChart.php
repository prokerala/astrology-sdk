<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SolarReturnChart implements ResultInterface
{
    use RawResponseTrait;

    private SolarReturnDetails $solarDetails;
    /**
     * @var PlanetAspect[]
     */
    private array $solarAspect;
    private string $solarDatetime;

    /**
     * @param PlanetAspect[] $solarAspect
     */
    public function __construct(SolarReturnDetails $solarDetails, array $solarAspect, string $solarDatetime){
        $this->solarDetails = $solarDetails;
        $this->solarAspect = $solarAspect;
        $this->solarDatetime = $solarDatetime;
    }

    public function getSolarDetails(): SolarReturnDetails
    {
        return $this->solarDetails;
    }

    /**
     * @return PlanetAspect[]
     */
    public function getSolarNatalAspect(): array
    {
        return $this->solarAspect;
    }

    public function getSolarDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->solarDatetime);
    }
}
