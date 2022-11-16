<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class KarmicLessonResult implements ResultInterface
{
    use RawResponseTrait;

    private ArrayNumber $arrayNumber;

    private NameChart $nameChart;

    public function __construct(ArrayNumber $arrayNumber, NameChart $nameChart)
    {
        $this->arrayNumber = $arrayNumber;
        $this->nameChart = $nameChart;
    }

    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
