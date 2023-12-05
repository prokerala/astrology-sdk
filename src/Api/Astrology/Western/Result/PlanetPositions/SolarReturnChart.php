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
    private array $solarReturnNatalAspects;
    private string $solarReturnDatetime;
    private int $solarReturnYear;

    /**
     * @param PlanetAspect[] $solarReturnNatalAspects
     */
    public function __construct(
        SolarReturnDetails $solarReturnDetails,
        array $solarReturnNatalAspects,
        string $solarReturnDatetime,
        int $solarReturnYear
    ){
        $this->solarReturnDetails = $solarReturnDetails;
        $this->solarReturnNatalAspects = $solarReturnNatalAspects;
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
        return $this->solarReturnNatalAspects;
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
