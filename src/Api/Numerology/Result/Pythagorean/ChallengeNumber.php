<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class ChallengeNumber
{
    /**
     * @param AgeNumber[] $challenges
     */
    public function __construct(private string $name, private array $challenges)
    {
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
