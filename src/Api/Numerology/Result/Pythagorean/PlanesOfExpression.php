<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PlanesOfExpression implements ResultInterface
{
    use RawResponseTrait;

    private Number $physical;

    private Number $mental;

    private Number $emotional;

    private Number $spiritual;

    private NameChart $nameChart;

    public function __construct(Number $physical, Number $mental, Number $emotional, Number $spiritual, NameChart $nameChart)
    {
        $this->physical = $physical;
        $this->mental = $mental;
        $this->emotional = $emotional;
        $this->spiritual = $spiritual;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getSpiritual(): Number
    {
        return $this->spiritual;
    }

    public function getMental(): Number
    {
        return $this->mental;
    }

    public function getEmotional(): Number
    {
        return $this->emotional;
    }

    public function getPhysical(): Number
    {
        return $this->physical;
    }
}
