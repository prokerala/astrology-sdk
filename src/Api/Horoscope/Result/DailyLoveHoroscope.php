<?php



namespace Prokerala\Api\Horoscope\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Horoscope\Entity\Zodiac;

class DailyLoveHoroscope implements ResultInterface
{
    use RawResponseTrait;

    private string $signCombination;
    private Zodiac $signOne;
    private Zodiac $signTwo;
    private string $prediction;

    public function __construct(string $signCombination, Zodiac $signOne, Zodiac $signTwo, string $prediction)
    {
        $this->signCombination = $signCombination;
        $this->signOne = $signOne;
        $this->signTwo = $signTwo;
        $this->prediction = $prediction;
    }

    public function getSignCombination(): string
    {
        return $this->signCombination;
    }

    public function getSignOne(): Zodiac
    {
        return $this->signOne;
    }

    public function getSignTwo(): Zodiac
    {
        return $this->signTwo;
    }

    public function getPrediction(): string
    {
        return $this->prediction;
    }
}
