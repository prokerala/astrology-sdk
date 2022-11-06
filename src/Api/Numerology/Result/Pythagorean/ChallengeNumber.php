<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class ChallengeNumber
{
    /** @var string */
    private $name;

    /**
     * @var AgeNumber[]
     */
    private $challenges;

    /**
     * @param string $name
     * @param AgeNumber[] $challenges
     */
    public function __construct(string $name, array $challenges)
    {
        $this->name = $name;
        $this->challenges = $challenges;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AgeNumber[]
     */
    public function getChallenges(): array
    {
        return $this->challenges;
    }
}
