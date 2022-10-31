<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class KarmicDebtNumber
{

    /**
     * @var AgeNumber[]
     */
    private array $karmicDebts;

    /**
     * @param AgeNumber[] $karmicDebts
     */
    public function __construct(array $karmicDebts)
    {
        $this->karmicDebts = $karmicDebts;
    }
    /**
     * @return AgeNumber[]
     */
    public function getKarmicDebts(): array
    {
        return $this->karmicDebts;
    }
}
