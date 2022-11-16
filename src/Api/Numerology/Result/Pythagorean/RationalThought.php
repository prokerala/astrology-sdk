<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class RationalThought implements ResultInterface
{
    use RawResponseTrait;

    private RationalThoughtNumber $rationalThoughtNumber;

    private NameChart $nameChart;

    public function __construct(RationalThoughtNumber $rationalThoughtNumber, NameChart $nameChart)
    {
        $this->rationalThoughtNumber = $rationalThoughtNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getRationalThoughtNumber(): RationalThoughtNumber
    {
        return $this->rationalThoughtNumber;
    }
}
