<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class KarmicDebt implements ResultInterface
{
    use RawResponseTrait;

    private KarmicDebtNumber $karmicDebtNumber;

    public function __construct(KarmicDebtNumber $karmicDebtNumber)
    {
        $this->karmicDebtNumber = $karmicDebtNumber;
    }

    public function getKarmicDebtNumber(): KarmicDebtNumber
    {
        return $this->karmicDebtNumber;
    }
}
