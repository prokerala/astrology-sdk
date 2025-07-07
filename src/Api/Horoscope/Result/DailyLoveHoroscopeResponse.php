<?php



namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class DailyLoveHoroscopeResponse implements ResultInterface
{
    use RawResponseTrait;

    private string $datetime;

    /**
     * @var \Prokerala\Api\Horoscope\Result\DailyLoveHoroscope[]
     */
    private array $dailyLovePredictions;

    /**
     * @param  \Prokerala\Api\Horoscope\Result\DailyLoveHoroscope[] $dailyLovePredictions
     */
    public function __construct(string $datetime, array $dailyLovePredictions)
    {
        $this->datetime = $datetime;
        $this->dailyLovePredictions = $dailyLovePredictions;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /** @return  \Prokerala\Api\Horoscope\Result\DailyLoveHoroscope[] */
    public function getDailyLovePredictions(): array
    {
        return $this->dailyLovePredictions;
    }

}
