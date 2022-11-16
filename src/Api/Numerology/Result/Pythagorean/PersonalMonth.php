<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalMonth implements ResultInterface
{
    use RawResponseTrait;

    private PersonalMonthNumber $personalMonthNumber;

    public function __construct(PersonalMonthNumber $personalMonthNumber)
    {
        $this->personalMonthNumber = $personalMonthNumber;
    }

    public function getPersonalMonthNumber(): PersonalMonthNumber
    {
        return $this->personalMonthNumber;
    }
}
