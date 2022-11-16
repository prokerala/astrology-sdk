<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Expression implements ResultInterface
{
    use RawResponseTrait;

    private ExpressionNumber $expressionNumber;

    private NameChart $nameChart;

    public function __construct(ExpressionNumber $expressionNumber, NameChart $nameChart)
    {
        $this->expressionNumber = $expressionNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getExpressionNumber(): ExpressionNumber
    {
        return $this->expressionNumber;
    }
}
