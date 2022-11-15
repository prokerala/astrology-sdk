<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class UniversalMonth implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private UniversalMonthNumber $universalMonthNumber)
    {
    }

    public function getUniversalMonthNumber(): UniversalMonthNumber
    {
        return $this->universalMonthNumber;
    }
}
