<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SoulUrge implements ResultInterface
{
    use RawResponseTrait;

    private SoulUrgeNumber $soulUrgeNumber;

    private NameChart $nameChart;

    public function __construct(SoulUrgeNumber $soulUrgeNumber, NameChart $nameChart)
    {
        $this->soulUrgeNumber = $soulUrgeNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getSoulUrgeNumber(): SoulUrgeNumber
    {
        return $this->soulUrgeNumber;
    }
}
