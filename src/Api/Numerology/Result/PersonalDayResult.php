<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class PersonalDayResult
{
    /**
     * @var Number
     */
    private $number;

    /**
     * @param Number $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }
}
