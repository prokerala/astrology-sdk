<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class ChallengeNumbers
{
    /**
     * @var AgeNumber[]
     */
    private array $challengeNumbers;

    /**
     * @param AgeNumber[] $challengeNumbers
     */
    public function __construct(array $challengeNumbers)
    {
        $this->challengeNumbers = $challengeNumbers;
    }
    /**
     * @return AgeNumber[]
     */
    public function getChallengeNumbers(): array
    {
        return $this->challengeNumbers;
    }


}
