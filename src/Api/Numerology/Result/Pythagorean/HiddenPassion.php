<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class HiddenPassion implements ResultInterface
{
    use RawResponseTrait;

    private HiddenPassionNumber $hiddenPassionNumber;

    private NameChart $nameChart;

    public function __construct(HiddenPassionNumber $hiddenPassionNumber, NameChart $nameChart)
    {
        $this->hiddenPassionNumber = $hiddenPassionNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getHiddenPassionNumber(): HiddenPassionNumber
    {
        return $this->hiddenPassionNumber;
    }
}
