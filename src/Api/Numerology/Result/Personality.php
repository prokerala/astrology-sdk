<?php

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Personality implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalityNumber
     */
    private $personalityNumber;

    public function __construct(PersonalityNumber $personalityNumber)
    {
        $this->personalityNumber = $personalityNumber;
    }

    public function getPersonalityNumber(): PersonalityNumber
    {
        return $this->personalityNumber;
    }
}
