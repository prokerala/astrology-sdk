<?php



namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class DailyHoroscopeAdvancedResponse implements ResultInterface
{
    use RawResponseTrait;

    private string $datetime;

    /**
     * @var \Prokerala\Api\Horoscope\Result\DailyHoroscopeAdvanced[]
     */
    private array $dailyPredictions;

    /**
     * @param  \Prokerala\Api\Horoscope\Result\DailyHoroscopeAdvanced[] $dailyPredictions
     */
    public function __construct(array $dailyPredictions, string $datetime)
    {
        $this->datetime = $datetime;
        $this->dailyPredictions = $dailyPredictions;
    }

    public function getDatetime(): string
    {
        return $this->datetime;
    }

    /** @return  \Prokerala\Api\Horoscope\Result\DailyHoroscopeAdvanced[] */
    public function getDailyPredictions(): array
    {
        return $this->dailyPredictions;
    }

}
