<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InclusionTableResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param \Prokerala\Api\Numerology\Result\Pythagorean\InclusionNumber[] $inclusionNumber
     * @param NameChart                                                      $nameChart
     */
    public function __construct(private $inclusionNumber, private $nameChart)
    {
    }

    /**
     * @return InclusionNumber[]
     */
    public function getInclusionNumber(): array
    {
        return $this->inclusionNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
