<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InnerDream implements ResultInterface
{
    use RawResponseTrait;

    private InnerDreamNumber $innerDreamNumber;

    private NameChart $nameChart;

    public function __construct(InnerDreamNumber $innerDreamNumber, NameChart $nameChart)
    {
        $this->innerDreamNumber = $innerDreamNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getInnerDreamNumber(): InnerDreamNumber
    {
        return $this->innerDreamNumber;
    }
}
