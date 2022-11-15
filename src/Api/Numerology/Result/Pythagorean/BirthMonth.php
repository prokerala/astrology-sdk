<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class BirthMonth implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private BirthMonthNumber $birthMonthNumber)
    {
    }

    public function getBirthMonthNumber(): BirthMonthNumber
    {
        return $this->birthMonthNumber;
    }
}
