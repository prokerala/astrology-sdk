<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class KarmicDebt implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private KarmicDebtNumber $karmicDebtNumber)
    {
    }

    public function getKarmicDebtNumber(): KarmicDebtNumber
    {
        return $this->karmicDebtNumber;
    }
}
