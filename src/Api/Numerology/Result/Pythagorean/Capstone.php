<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Capstone implements ResultInterface
{
    use RawResponseTrait;

    private CapstoneNumber $capstoneNumber;

    private NameChart $nameChart;

    public function __construct(CapstoneNumber $capstoneNumber, NameChart $nameChart)
    {
        $this->capstoneNumber = $capstoneNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getCapStoneNumber(): CapstoneNumber
    {
        return $this->capstoneNumber;
    }
}
