<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\KarmicNumber;

class KarmicLessonResult implements ResultInterface
{
    use RawResponseTrait;

    private KarmicNumber $karmicLessonNumber;

    private NameChart $nameChart;

    public function __construct(KarmicNumber $karmicLessonNumber, NameChart $nameChart)
    {
        $this->karmicLessonNumber = $karmicLessonNumber;
        $this->nameChart = $nameChart;
    }

    public function getKarmicLessonNumber(): KarmicNumber
    {
        return $this->karmicLessonNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
