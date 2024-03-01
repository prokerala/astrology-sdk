<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\TransitCycleNumber;

class TransitCycleNumberResult implements ResultInterface
{
    use RawResponseTrait;
    private TransitCycleNumber $transitCycleNumber;
    private NameChart $nameChart;

    public function __construct(
        TransitCycleNumber $transitCycleNumber,
        NameChart $nameChart,
    ) {
        $this->transitCycleNumber = $transitCycleNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getTransitCycleNumber(): TransitCycleNumber
    {
        return $this->transitCycleNumber;
    }
}
