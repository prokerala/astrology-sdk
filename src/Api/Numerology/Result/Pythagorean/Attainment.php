<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Attainment implements ResultInterface
{
    use RawResponseTrait;

    private AttainmentNumber $attainmentNumber;

    private NameChart $nameChart;

    public function __construct(AttainmentNumber $attainmentNumber, NameChart $nameChart)
    {
        $this->attainmentNumber = $attainmentNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getAttainmentNumber(): AttainmentNumber
    {
        return $this->attainmentNumber;
    }
}
