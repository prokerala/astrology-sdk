<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class BirthMonthResult
{
    /**
     * @var Number $number
     */
    private $number;

    /**
     * @param Number $number
     */
    public function __construct($number) {
        $this->number = $number;
    }

    /**
     * @return Number
     */
    public function getNumber(): Number
    {
        return $this->number;
    }
}
