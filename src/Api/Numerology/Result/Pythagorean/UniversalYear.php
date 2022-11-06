<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class UniversalYear implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var UniversalYearNumber
     */
    private $universalYearNumber;

    public function __construct(UniversalYearNumber $universalYearNumber)
    {
        $this->universalYearNumber = $universalYearNumber;
    }

    public function getUniversalYearNumber(): UniversalYearNumber
    {
        return $this->universalYearNumber;
    }
}
