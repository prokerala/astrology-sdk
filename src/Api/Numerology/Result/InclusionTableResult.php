<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class InclusionTableResult implements JsonSerializable
{
    /**
     * @var array
     */
    private $inclusionNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param array $inclusionNumber
     * @param NameChart $nameChart
     */
    public function __construct($inclusionNumber, $nameChart)
    {
        $this->inclusionNumber = $inclusionNumber;
        $this->nameChart = $nameChart;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return InclusionNumber[]
     */
    public function getInclusionNumber(): array
    {
        return $this->inclusionNumber;
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
            'InclusionNumber' => $this->inclusionNumber,
            'name_chart' => $this->nameChart,
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
