<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class RationalThoughtResult implements JsonSerializable
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
     * @param int $id
     * @param string $title
     * @param Number $number
     * @param NameChart $nameChart
     */
    public function __construct($id, $title, $number, $nameChart) {
        $this->id = $id;
        $this->title = $title;
        $this->number = $number;
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
            'id' =>$this->id,
            'title' =>$this->title,
            'number' => $this->number,
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
