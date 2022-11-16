<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalYear implements ResultInterface
{
    use RawResponseTrait;

    private PersonalYearNumber $personalYearNumber;

    public function __construct(PersonalYearNumber $personalYearNumber)
    {
        $this->personalYearNumber = $personalYearNumber;
    }

    public function getPersonalYearNumber(): PersonalYearNumber
    {
        return $this->personalYearNumber;
    }
}
