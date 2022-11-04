<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class CapStoneResult
{
    /**
     * @var Number $number
     */
    private $number;
    /**
     * @var NameChart $nameChart
     */
    private $nameChart;

    /**
     * @param Number $number
     * @param NameChart $nameChart
     */
    public function __construct($number, $nameChart) {
        $this->number = $number;
        $this->nameChart = $nameChart;
    }

    /**
     * @return Number
     */
    public function getNumber(): Number
    {
        return $this->number;
    }

    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
