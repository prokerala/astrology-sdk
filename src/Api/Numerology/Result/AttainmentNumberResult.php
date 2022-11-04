<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class AttainmentNumberResult implements \JsonSerializable
{
    /**
     * @var Number
     */
    private $number;

    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param Number    $number
     * @param NameChart $nameChart
     */
    public function __construct($number, $nameChart)
    {
        $this->number = $number;
        $this->nameChart = $nameChart;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return string
     */
}
