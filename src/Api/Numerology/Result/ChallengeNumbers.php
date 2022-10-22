<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class ChallengeNumbers implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
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
     * @param int $id
     * @param string $title
     * @param AgeNumberDescription $challengeNumber1
     * @param AgeNumberDescription $challengeNumber2
     * @param AgeNumberDescription $challengeNumber3
     * @param AgeNumberDescription $challengeNumber4
     */
    public function __construct(
        $id,
        $title,
        $challengeNumber1,
        $challengeNumber2,
        $challengeNumber3,
        $challengeNumber4
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->challengeNumber1 = $challengeNumber1;
        $this->challengeNumber2 = $challengeNumber2;
        $this->challengeNumber3 = $challengeNumber3;
        $this->challengeNumber4 = $challengeNumber4;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'challenge_number_1' => $this->challengeNumber1,
            'challenge_number_2' => $this->challengeNumber2,
            'challenge_number_3' => $this->challengeNumber3,
            'challenge_number_4' => $this->challengeNumber4,
        ];
    }
}
