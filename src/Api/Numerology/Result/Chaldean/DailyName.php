<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class DailyName implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DailyNameNumber
     */
    private $dailyNameNumber;

    public function __construct(DailyNameNumber $dailyNameNumber)
    {
        $this->dailyNameNumber = $dailyNameNumber;
    }

    public function getDailyNameNumber(): DailyNameNumber
    {
        return $this->dailyNameNumber;
    }
}
