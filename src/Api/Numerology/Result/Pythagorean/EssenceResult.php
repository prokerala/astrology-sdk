<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\EssenceNumber;

class EssenceResult implements ResultInterface
{
    use RawResponseTrait;

    private EssenceNumber $essenceNumber;

    private NameChart $nameChart;

    public function __construct(EssenceNumber $essenceNumber, NameChart $nameChart)
    {
        $this->essenceNumber = $essenceNumber;
        $this->nameChart = $nameChart;
    }

    public function getEssenceNumber(): EssenceNumber
    {
        return $this->essenceNumber;
    }


    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
