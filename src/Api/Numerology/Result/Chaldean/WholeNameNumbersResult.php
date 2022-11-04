<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Numerology\Result\Number;

class WholeNameNumbersResult
{
    /**
     * @var Number
     */
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }
}
