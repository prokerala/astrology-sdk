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
     * @var NameChart $nameChart
     */
    private $nameChart;

    public function __construct($arrayNumber, $nameChart) {
        $this->arrayNumber = $arrayNumber;
        $this->nameChart = $nameChart;
    }

    /**
     * @return ArrayNumber
     */
    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
    }

    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
