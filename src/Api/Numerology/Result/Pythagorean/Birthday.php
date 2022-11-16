<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Birthday implements ResultInterface
{
    use RawResponseTrait;

    private BirthdayNumber $birthdayNumber;

    public function __construct(BirthdayNumber $birthdayNumber)
    {
        $this->birthdayNumber = $birthdayNumber;
    }

    public function getBirthdayNumber(): BirthdayNumber
    {
        return $this->birthdayNumber;
    }
}
