<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalDay implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalDayNumber
     */
    private $personalDayNumber;

    public function __construct(PersonalDayNumber $personalDayNumber)
    {
        $this->personalDayNumber = $personalDayNumber;
    }

    public function getPersonalDayNumber(): PersonalDayNumber
    {
        return $this->personalDayNumber;
    }
}
