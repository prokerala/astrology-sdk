<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class RationalThoughtResult implements \JsonSerializable
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
     * @param int       $id
     * @param string    $title
     * @param Number    $number
     * @param NameChart $nameChart
     */
    public function __construct($id, $title, $number, $nameChart)
    {
        $this->id = $id;
        $this->title = $title;
        $this->number = $number;
        $this->nameChart = $nameChart;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'number' => $this->number,
            'name_chart' => $this->nameChart,
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
