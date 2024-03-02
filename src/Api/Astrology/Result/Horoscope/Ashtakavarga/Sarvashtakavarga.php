<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga;

class Sarvashtakavarga
{
    /**
     * @var AshtakavargaChartHouse[]
     */
    private array $houses;

    private int $score;

    /**
     * @param AshtakavargaChartHouse[] $houses
     */
    public function __construct(
        array $houses,
        int $score,
    ) {
        $this->houses = $houses;
        $this->score = $score;
    }

    /**
     * @return AshtakavargaChartHouse[]
     */
    public function getHouses(): array
    {
        return $this->houses;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
