<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class KarmicDebtNumber
{
    private string $name;

    /**
     * @var Number[]
     */
    private array $debts;

    /**
     * @param Number[] $debts
     */
    public function __construct(string $name, array $debts)
    {
        $this->name = $name;
        $this->debts = $debts;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Number[]
     */
    public function getDebts(): array
    {
        return $this->debts;
    }
}
