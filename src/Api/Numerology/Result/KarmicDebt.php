<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class KarmicDebt implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var KarmicDebtNumber
     */
    private $karmicDebtNumber;

    public function __construct(KarmicDebtNumber $karmicDebtNumber)
    {
        $this->karmicDebtNumber = $karmicDebtNumber;
    }

    public function getKarmicDebtNumber(): KarmicDebtNumber
    {
        return $this->karmicDebtNumber;
    }
}
