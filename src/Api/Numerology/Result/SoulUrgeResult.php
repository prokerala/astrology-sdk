<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class SoulUrgeResult implements JsonSerializable
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
     *
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

    public function jsonSerialize(): array
    {
        return [
            'number' => $this->number,
            'name_chart' => $this->nameChart,
        ];
    }
}
