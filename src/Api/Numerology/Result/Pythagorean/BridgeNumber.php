<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class BridgeNumber
{
    private string $name;

    /**
     * @var Number[]
     */
    private array $differences;

    /**
     * @param Number[] $differences
     */
    public function __construct(string $name, array $differences)
    {
        $this->name = $name;
        $this->differences = $differences;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Number[]
     */
    public function getDifferences(): array
    {
        return $this->differences;
    }
}
