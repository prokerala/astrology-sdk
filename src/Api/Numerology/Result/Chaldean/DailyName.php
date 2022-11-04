<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Chaldean\DailyNameNumber;


class DailyName implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DailyNameNumber
     */
    private $dailyNameNumber;


    /**
     * @param DailyNameNumber $dailyNameNumber
     */
    public function __construct(DailyNameNumber $dailyNameNumber) {
        $this->dailyNameNumber = $dailyNameNumber;
    }

    /**
     * @return DailyNameNumber
     */
    public function getDailyNameNumber(): DailyNameNumber
    {
        return $this->dailyNameNumber;
    }


}
