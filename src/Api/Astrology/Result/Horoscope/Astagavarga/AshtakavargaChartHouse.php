<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\Astagavarga;

use Prokerala\Api\Astrology\Result\Element\Rasi;

class AshtakavargaChartHouse
{
    private Bhava $house;

    private Rasi $rasi;

    /** @var AshtakavargaPlanet[] */
    private array $planets;

    private int $score;

    /**
     * @param AshtakavargaPlanet[] $planets
     */
    public function __construct(
        Bhava $house,
        Rasi $rasi,
        array $planets,
        int $score,
    ) {
        $this->house = $house;
        $this->rasi = $rasi;
        $this->planets = $planets;
        $this->score = $score;
    }

    public function getHouse(): Bhava
    {
        return $this->house;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }

    public function getPlanets(): array
    {
        return $this->planets;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
