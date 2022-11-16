<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class UniversalDay implements ResultInterface
{
    use RawResponseTrait;

    private UniversalDayNumber $universalDayNumber;

    public function __construct(UniversalDayNumber $universalDayNumber)
    {
        $this->universalDayNumber = $universalDayNumber;
    }

    public function getUniversalDayNumber(): UniversalDayNumber
    {
        return $this->universalDayNumber;
    }
}
