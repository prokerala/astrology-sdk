<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class PinnacleNumber
{
    private string $name;

    /**
     * @var AgeNumber[]
     */
    private array $pinnacles;

    /**
     * @param AgeNumber[] $pinnacles
     */
    public function __construct(string $name, array $pinnacles)
    {
        $this->name = $name;
        $this->pinnacles = $pinnacles;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AgeNumber[]
     */
    public function getPinnacles(): array
    {
        return $this->pinnacles;
    }
}
