<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;



class Challenge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ChallengeNumbers
     */
    private $challenge;


    /**
     * @param ChallengeNumbers $challenge
     */
    public function __construct(ChallengeNumbers $challenge) {
        $this->challenge = $challenge;
    }

    /**
     * @return ChallengeNumbers
     */
    public function getChallenge(): ChallengeNumbers
    {
        return $this->challenge;
    }

}
