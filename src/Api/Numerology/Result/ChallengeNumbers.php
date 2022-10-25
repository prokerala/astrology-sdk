<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class ChallengeNumbers
{
    /**
     * @var AgeNumberDescription
     */
    private $challengeNumber1;
    /**
     * @var AgeNumberDescription
     */
    private $challengeNumber2;
    /**
     * @var AgeNumberDescription
     */
    private $challengeNumber3;
    /**
     * @var AgeNumberDescription
     */
    private $challengeNumber4;

    /**
     * @param AgeNumberDescription $challengeNumber1
     * @param AgeNumberDescription $challengeNumber2
     * @param AgeNumberDescription $challengeNumber3
     * @param AgeNumberDescription $challengeNumber4
     */
    public function __construct(
        $challengeNumber1,
        $challengeNumber2,
        $challengeNumber3,
        $challengeNumber4
    )
    {
        $this->challengeNumber1 = $challengeNumber1;
        $this->challengeNumber2 = $challengeNumber2;
        $this->challengeNumber3 = $challengeNumber3;
        $this->challengeNumber4 = $challengeNumber4;
    }
    /**
     * @return AgeNumberDescription
     */
    public function getChallengeNumber1(): AgeNumberDescription
    {
        return $this->challengeNumber1;
    }

    /**
     * @return AgeNumberDescription
     */
    public function getChallengeNumber2(): AgeNumberDescription
    {
        return $this->challengeNumber2;
    }

    /**
     * @return AgeNumberDescription
     */
    public function getChallengeNumber3(): AgeNumberDescription
    {
        return $this->challengeNumber3;
    }

    /**
     * @return AgeNumberDescription
     */
    public function getChallengeNumber4(): AgeNumberDescription
    {
        return $this->challengeNumber4;
    }
}
