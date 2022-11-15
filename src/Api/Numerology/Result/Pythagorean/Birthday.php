<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Birthday implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private BirthdayNumber $birthdayNumber)
    {
    }

    public function getBirthdayNumber(): BirthdayNumber
    {
        return $this->birthdayNumber;
    }
}
