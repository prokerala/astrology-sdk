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
    private array $progressionNatalAspect;
    private string $progressionDatetime;

    /**
     * @param \Prokerala\Api\Astrology\Western\Result\PlanetPositions\PlanetAspect[] $progressionNatalAspect
     */
    public function __construct(ProgressionDetails $progressionDetails, array $progressionNatalAspect, string $progressionDatetime){
        $this->progressionDetails = $progressionDetails;
        $this->progressionNatalAspect = $progressionNatalAspect;
        $this->progressionDatetime = $progressionDatetime;
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
        return $this->progressionNatalAspect;
    }

    public function getProgressionDatetime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->progressionDatetime);
    }
}
