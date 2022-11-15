<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class DailyName implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DailyNameNumber
     */
    private $dailyNameNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(DailyNameNumber $dailyNameNumber, NameChart $nameChart)
    {
        $this->dailyNameNumber = $dailyNameNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getDailyNameNumber(): DailyNameNumber
    {
        return $this->dailyNameNumber;
    }
}
