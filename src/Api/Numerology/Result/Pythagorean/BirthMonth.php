<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class BirthMonth implements ResultInterface
{
    use RawResponseTrait;

    private BirthMonthNumber $birthMonthNumber;

    public function __construct(BirthMonthNumber $birthMonthNumber)
    {
        $this->birthMonthNumber = $birthMonthNumber;
    }

    public function getBirthMonthNumber(): BirthMonthNumber
    {
        return $this->birthMonthNumber;
    }
}
