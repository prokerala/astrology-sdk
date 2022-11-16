<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalDay implements ResultInterface
{
    use RawResponseTrait;

    private PersonalDayNumber $personalDayNumber;

    public function __construct(PersonalDayNumber $personalDayNumber)
    {
        $this->personalDayNumber = $personalDayNumber;
    }

    public function getPersonalDayNumber(): PersonalDayNumber
    {
        return $this->personalDayNumber;
    }
}
