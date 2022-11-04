<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class WholeName implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var WholeNameNumber
     */
    private $wholeNameNumber;

    public function __construct(WholeNameNumber $wholeNameNumber)
    {
        $this->wholeNameNumber = $wholeNameNumber;
    }

    public function getWholeNameNumber(): WholeNameNumber
    {
        return $this->wholeNameNumber;
    }
}
