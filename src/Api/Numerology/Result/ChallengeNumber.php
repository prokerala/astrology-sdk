<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class ChallengeNumber
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $challenges;

    /**
     * @param string $name
     * @param AgeNumber[] $challenges
     */
    public function __construct(string $name, array $challenges)
    {
        $this->name = $name;
        $this->challenges = $challenges;
    }

    /**
     * @return string
     */
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
