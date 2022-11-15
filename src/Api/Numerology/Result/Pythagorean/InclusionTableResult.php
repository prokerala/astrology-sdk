<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InclusionTableResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var InclusionNumber[]
     */
    private $inclusionNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param \Prokerala\Api\Numerology\Result\Pythagorean\InclusionNumber[] $inclusionNumber
     * @param NameChart                                                      $nameChart
     */
    public function __construct($inclusionNumber, $nameChart)
    {
        $this->inclusionNumber = $inclusionNumber;
        $this->nameChart = $nameChart;
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
