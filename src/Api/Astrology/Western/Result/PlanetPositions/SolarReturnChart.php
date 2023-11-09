<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SolarReturnChart implements ResultInterface
{
    use RawResponseTrait;

    private SolarReturnDetails $solarReturnDetails;
    /**
     * @var PlanetAspect[]
     */
    private array $solarReturnAspects;
    private string $solarReturnDatetime;
    private int $solarReturnYear;

    /**
     * @param PlanetAspect[] $solarReturnAspects
     */
    public function __construct(
        SolarReturnDetails $solarReturnDetails,
        array $solarReturnAspects,
        string $solarReturnDatetime,
        int $solarReturnYear
    ){
        $this->solarReturnDetails = $solarReturnDetails;
        $this->solarReturnAspects = $solarReturnAspects;
        $this->solarReturnDatetime = $solarReturnDatetime;
        $this->solarReturnYear = $solarReturnYear;
    }

    public function getSolarDetails(): SolarReturnDetails
    {
        return $this->solarReturnDetails;
    }

    /**
     * @return PlanetAspect[]
     */
    public function getSolarNatalAspect(): array
    {
        return $this->solarReturnAspects;
    }

    public function getSolarDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->solarReturnDatetime);
    }

    public function getSolarReturnYear(): int
    {
        return $this->solarReturnYear;
    }
}
