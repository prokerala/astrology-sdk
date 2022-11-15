<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Challenge implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private ChallengeNumber $challengeNumber)
    {
    }

    public function getChallengeNumber(): ChallengeNumber
    {
        return $this->challengeNumber;
    }
}
