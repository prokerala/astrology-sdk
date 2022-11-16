<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Cornerstone implements ResultInterface
{
    use RawResponseTrait;

    private CornerstoneNumber $cornerstoneNumber;

    private NameChart $nameChart;

    public function __construct(CornerstoneNumber $cornerstoneNumber, NameChart $nameChart)
    {
        $this->cornerstoneNumber = $cornerstoneNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getCornerstoneNumber(): CornerstoneNumber
    {
        return $this->cornerstoneNumber;
    }
}
