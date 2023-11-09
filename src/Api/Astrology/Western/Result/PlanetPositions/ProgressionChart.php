<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Western\Result\PlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class ProgressionChart implements ResultInterface
{
    use RawResponseTrait;

    private ProgressionDetails $progressionDetails;
    /**
     * @var \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    private array $progressionNatalAspects;
    private int $progressionYear;
    private string $progressionDate;

    /**
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[] $progressionNatalAspects
     */
    public function __construct(
        ProgressionDetails $progressionDetails,
        array $progressionNatalAspects,
        int $progressionYear,
        string $progressionDate
    ){
        $this->progressionDetails = $progressionDetails;
        $this->progressionNatalAspects = $progressionNatalAspects;
        $this->progressionYear = $progressionYear;
        $this->progressionDate = $progressionDate;
    }

    public function getProgressionDetails(): ProgressionDetails
    {
        return $this->progressionDetails;
    }

    /**
     * @return \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[]
     */
    public function getProgressionNatalAspect(): array
    {
        return $this->progressionNatalAspects;
    }

    public function getProgressionDate(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->progressionDate);
    }

    public function getProgressionYear(): int
    {
        return $this->progressionYear;
    }
}
