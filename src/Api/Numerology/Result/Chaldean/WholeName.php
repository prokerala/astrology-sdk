<?php



namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class WholeName implements ResultInterface
{
    use RawResponseTrait;

    private WholeNameNumber $wholeNameNumber;

    private NameChart $nameChart;

    public function __construct(WholeNameNumber $wholeNameNumber, NameChart $nameChart)
    {
        $this->wholeNameNumber = $wholeNameNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getWholeNameNumber(): WholeNameNumber
    {
        return $this->wholeNameNumber;
    }
}
