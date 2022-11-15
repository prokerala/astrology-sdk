<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class DailyName implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private DailyNameNumber $dailyNameNumber, private NameChart $nameChart)
    {
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
