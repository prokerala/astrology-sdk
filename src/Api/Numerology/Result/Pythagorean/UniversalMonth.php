<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class UniversalMonth implements ResultInterface
{
    use RawResponseTrait;

    private UniversalMonthNumber $universalMonthNumber;

    public function __construct(UniversalMonthNumber $universalMonthNumber)
    {
        $this->universalMonthNumber = $universalMonthNumber;
    }

    public function getUniversalMonthNumber(): UniversalMonthNumber
    {
        return $this->universalMonthNumber;
    }
}
