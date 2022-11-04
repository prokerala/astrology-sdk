<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class EssenceResult
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
}
