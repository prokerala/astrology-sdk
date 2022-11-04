<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class KarmicDebtNumber
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var Number[]
     */
    private array $debts;

    /**
     * @param string $name
     * @param Number[] $debts
     */
    public function __construct(string $name, array $debts)
    {
        $this->name = $name;
        $this->debts = $debts;
    }

    /**
     * @return string
     */
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
