<?php



namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Birth implements ResultInterface
{
    use RawResponseTrait;

    private BirthNumber $birthNumber;

    public function __construct(BirthNumber $birthNumber)
    {
        $this->birthNumber = $birthNumber;
    }

    public function getBirthNumber(): BirthNumber
    {
        return $this->birthNumber;
    }
}
