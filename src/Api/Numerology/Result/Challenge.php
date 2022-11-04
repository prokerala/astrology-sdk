<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;



class Challenge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ChallengeNumber
     */
    private $challengeNumber;


    /**
     * @param ChallengeNumber $challengeNumber
     */
    public function __construct(ChallengeNumber $challengeNumber) {
        $this->challengeNumber = $challengeNumber;
    }

    /**
     * @return ChallengeNumber
     */
    public function getChallengeNumber(): ChallengeNumber
    {
        return $this->challengeNumber;
    }

}
