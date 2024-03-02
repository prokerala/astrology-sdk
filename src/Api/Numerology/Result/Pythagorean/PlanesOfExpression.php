<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\PlanesOfExpressionNumber;

class PlanesOfExpression implements ResultInterface
{
    use RawResponseTrait;

    private PlanesOfExpressionNumber $planesOfExpression;
    private NameChart $nameChart;

    public function __construct(PlanesOfExpressionNumber $planesOfExpression, NameChart $nameChart)
    {
        $this->planesOfExpression = $planesOfExpression;
        $this->nameChart = $nameChart;
    }

    public function getPlanesOfExpression(): PlanesOfExpressionNumber
    {
        return $this->planesOfExpression;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

}
