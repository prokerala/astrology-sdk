<?php

declare(strict_types=1);

namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class DailyHoroscope implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private DailyHoroscopePrediction $dailyPrediction)
    {
    }

    public function getDailyHoroscopePrediction(): DailyHoroscopePrediction
    {
        return $this->dailyPrediction;
    }
}
