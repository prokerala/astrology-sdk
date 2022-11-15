<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga;

class Period
{
    /**
     * @param Combination[] $combination
     */
    public function __construct(private \DateTimeInterface $start, private \DateTimeInterface $end, private array $combination)
    {
    }

    /**
     * @return Combination[]
     */
    public function getCombination(): array
    {
        return $this->combination;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }
}
