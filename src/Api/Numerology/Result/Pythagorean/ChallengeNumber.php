<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class ChallengeNumber
{
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $challenges;

    /**
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
