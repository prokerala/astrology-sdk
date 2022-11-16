<?php



namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class DailyName implements ResultInterface
{
    use RawResponseTrait;

    private DailyNameNumber $dailyNameNumber;

    private NameChart $nameChart;

    public function __construct(DailyNameNumber $dailyNameNumber, NameChart $nameChart)
    {
        $this->dailyNameNumber = $dailyNameNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getDailyNameNumber(): DailyNameNumber
    {
        return $this->dailyNameNumber;
    }
}
