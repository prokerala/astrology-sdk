<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga;

class Period
{
    /**
     * @var \DateTimeInterface
     */
    private $start;
    /**
     * @var \DateTimeInterface
     */
    private $end;
    /**
     * @var Combination[]
     */
    private $combination;

    /**
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     * @param Combination[] $combination
     */
    public function __construct(\DateTimeInterface $start, \DateTimeInterface $end, array $combination) {
        $this->start = $start;
        $this->end = $end;
        $this->combination = $combination;
    }

    /**
     * @return Combination[]
     */
    public function getCombination(): array
    {
        return $this->combination;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }
}
