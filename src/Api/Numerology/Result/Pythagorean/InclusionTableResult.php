<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\InclusionNumber;

class InclusionTableResult implements ResultInterface
{
    use RawResponseTrait;

    private InclusionNumber $inclusionTableNumber;

    private NameChart $nameChart;

    public function __construct(InclusionNumber $inclusionTableNumber, NameChart $nameChart)
    {
        $this->inclusionTableNumber = $inclusionTableNumber;
        $this->nameChart = $nameChart;
    }

    public function getInclusionTableNumber(): InclusionNumber
    {
        return $this->inclusionTableNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
