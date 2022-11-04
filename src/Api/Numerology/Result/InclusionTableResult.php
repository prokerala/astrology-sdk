<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InclusionTableResult implements \JsonSerializable, ResultInterface
{
    use RawResponseTrait;

    /**
     * @var array
     */
    private $inclusionNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param array     $inclusionNumber
     * @param NameChart $nameChart
     */
    public function __construct($inclusionNumber, $nameChart)
    {
        $this->inclusionNumber = $inclusionNumber;
        $this->nameChart = $nameChart;
    }

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

    public function getTitle(): string
    {
        return $this->title;
    }
}
