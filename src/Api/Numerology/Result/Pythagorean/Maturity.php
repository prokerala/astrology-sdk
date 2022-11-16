<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Maturity implements ResultInterface
{
    use RawResponseTrait;

    private MaturityNumber $maturityNumber;

    private NameChart $nameChart;

    public function __construct(MaturityNumber $maturityNumber, NameChart $nameChart)
    {
        $this->maturityNumber = $maturityNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getMaturityNumber(): MaturityNumber
    {
        return $this->maturityNumber;
    }
}
