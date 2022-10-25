<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\FirstChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\SecondChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\ThirdChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\FourthChallenge;


class Challenge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ChallengeResult
     */
    private $challenge;


    /**
     * @param ChallengeResult $challenge
     */
    public function __construct(ChallengeResult $challenge) {
        $this->challenge = $challenge;
    }

    /**
     * @return ChallengeResult
     */
    public function getChallenge(): ChallengeResult
    {
        return $this->challenge;
    }

}
