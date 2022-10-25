<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\FirstChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\FourthChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\SecondChallenge;
use Prokerala\Api\Numerology\Result\ChallengeNumbers\ThirdChallenge;

class ChallengeResult
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var FirstChallenge
     */
    private $firstChallenge;

    /**
     * @var SecondChallenge
     */
    private $secondChallenge;

    /**
     * @var ThirdChallenge
     */
    private $thirdChallenge;

    /**
     * @var FourthChallenge
     */
    private $fourthChallenge;

    /**
     * @param string $name
     * @param FirstChallenge $firstChallenge
     * @param SecondChallenge $secondChallenge
     * @param ThirdChallenge $thirdChallenge
     * @param FourthChallenge $fourthChallenge
     */
    public function __construct(string $name, FirstChallenge $firstChallenge, SecondChallenge $secondChallenge, ThirdChallenge $thirdChallenge, FourthChallenge $fourthChallenge) {
        $this->name = $name;
        $this->firstChallenge = $firstChallenge;
        $this->secondChallenge = $secondChallenge;
        $this->thirdChallenge = $thirdChallenge;
        $this->fourthChallenge = $fourthChallenge;

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return FirstChallenge
     */
    public function getFirstChallenge(): FirstChallenge
    {
        return $this->firstChallenge;
    }

    /**
     * @return SecondChallenge
     */
    public function getSecondChallenge(): SecondChallenge
    {
        return $this->secondChallenge;
    }

    /**
     * @return ThirdChallenge
     */
    public function getThirdChallenge(): ThirdChallenge
    {
        return $this->thirdChallenge;
    }

    /**
     * @return FourthChallenge
     */
    public function getFourthChallenge(): FourthChallenge
    {
        return $this->fourthChallenge;
    }

}
