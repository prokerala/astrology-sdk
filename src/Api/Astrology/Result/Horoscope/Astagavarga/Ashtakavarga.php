<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\Astagavarga;

class Ashtakavarga
{
    /** @var AshtakavargaChartHouse[] */
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

    public function getHouses(): array
    {
        return $this->houses;
    }

    public function getScore(): int
    {
        return $this->score;
    }
}
