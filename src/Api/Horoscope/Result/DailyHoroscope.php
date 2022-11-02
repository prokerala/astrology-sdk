<?php
declare(strict_types=1);

namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use  Prokerala\Api\Horoscope\Result\DailyHoroscopePrediction;


class DailyHoroscope implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DailyHoroscopePrediction
     */
    private $dailyPrediction;

    /**
     * @param DailyHoroscopePrediction $dailyPrediction
     */
    public function __construct(DailyHoroscopePrediction $dailyPrediction) {

        $this->dailyPrediction = $dailyPrediction;
    }

    /**
     * @return DailyHoroscopePrediction
     */
    public function getDailyHoroscopePrediction(): DailyHoroscopePrediction
    {
        return $this->dailyPrediction;
    }
}
