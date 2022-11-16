<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Challenge implements ResultInterface
{
    use RawResponseTrait;

    private ChallengeNumber $challengeNumber;

    public function __construct(ChallengeNumber $challengeNumber)
    {
        $this->challengeNumber = $challengeNumber;
    }

    public function getChallengeNumber(): ChallengeNumber
    {
        return $this->challengeNumber;
    }
}
