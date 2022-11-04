<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class KarmicLessonResult implements JsonSerializable
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

    public function jsonSerialize(): array
    {
        return [
            'array_number' => $this->arrayNumber,
            'name_chart' => $this->nameChart,
        ];
    }

}
