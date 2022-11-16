<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Personality implements ResultInterface
{
    use RawResponseTrait;

    private PersonalityNumber $personalityNumber;

    public function __construct(PersonalityNumber $personalityNumber)
    {
        $this->personalityNumber = $personalityNumber;
    }

    public function getPersonalityNumber(): PersonalityNumber
    {
        return $this->personalityNumber;
    }
}
