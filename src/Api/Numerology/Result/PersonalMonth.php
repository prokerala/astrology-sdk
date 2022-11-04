<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalMonth implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalMonthNumber
     */
    private $personalMonthNumber;

    public function __construct(PersonalMonthNumber $personalMonthNumber)
    {
        $this->personalMonthNumber = $personalMonthNumber;
    }

    public function getPersonalMonthNumber(): PersonalMonthNumber
    {
        return $this->personalMonthNumber;
    }
}
