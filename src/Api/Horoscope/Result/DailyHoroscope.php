<?php



namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class DailyHoroscope implements ResultInterface
{
    use RawResponseTrait;

    private DailyHoroscopePrediction $dailyPrediction;

    public function __construct(DailyHoroscopePrediction $dailyPrediction)
    {
        $this->dailyPrediction = $dailyPrediction;
    }

    public function getDailyHoroscopePrediction(): DailyHoroscopePrediction
    {
        return $this->dailyPrediction;
    }
}
