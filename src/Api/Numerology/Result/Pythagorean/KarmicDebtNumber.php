<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class KarmicDebtNumber
{
    /**
     * @param Number[] $debts
     */
    public function __construct(private string $name, private array $debts)
    {
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
