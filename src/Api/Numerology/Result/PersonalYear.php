<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalYear implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalYearNumber
     */
    private $personalYearNumber;

    public function __construct(PersonalYearNumber $personalYearNumber)
    {
        $this->personalYearNumber = $personalYearNumber;
    }

    public function getPersonalYearNumber(): PersonalYearNumber
    {
        return $this->personalYearNumber;
    }
}
