<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Birthday implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BirthdayNumber
     */
    private $birthdayNumber;

    public function __construct(BirthdayNumber $birthdayNumber)
    {
        $this->birthdayNumber = $birthdayNumber;
    }

    public function getBirthdayNumber(): BirthdayNumber
    {
        return $this->birthdayNumber;
    }
}
