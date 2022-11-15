<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class UniversalYear implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private UniversalYearNumber $universalYearNumber)
    {
    }

    public function getUniversalYearNumber(): UniversalYearNumber
    {
        return $this->universalYearNumber;
    }
}
