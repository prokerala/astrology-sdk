<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class KarmicLessonResult implements \JsonSerializable
{
    /**
     * @var ArrayNumber
     */
    private $arrayNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct($arrayNumber, $nameChart)
    {
        $this->arrayNumber = $arrayNumber;
        $this->nameChart = $nameChart;
    }

    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function jsonSerialize(): array
    {
        return [
            'array_number' => $this->arrayNumber,
            'name_chart' => $this->nameChart,
        ];
    }
}
