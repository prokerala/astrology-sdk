<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class PlanesOfExpression implements \JsonSerializable
{
    /**
     * @var Number
     */
    private $physical;

    /**
     * @var Number
     */
    private $mental;

    /**
     * @var Number
     */
    private $emotional;

    /**
     * @var Number
     */
    private $spiritual;

    /**
     * @param Number    $physical
     * @param Number    $mental
     * @param Number    $emotional
     * @param Number    $spiritual
     * @param NameChart $nameChart
     */
    public function __construct($physical, $mental, $emotional, $spiritual, $nameChart)
    {
        $this->physical = $physical;
        $this->mental = $mental;
        $this->emotional = $emotional;
        $this->spiritual = $spiritual;
        $this->nameChart = $nameChart;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getSpiritual(): Number
    {
        return $this->spiritual;
    }

    public function getMental(): Number
    {
        return $this->mental;
    }

    public function getEmotional(): Number
    {
        return $this->emotional;
    }

    public function getPhysical(): Number
    {
        return $this->physical;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'physical' => $this->physical,
            'mental' => $this->mental,
            'emotional' => $this->emotional,
            'spiritual' => $this->spiritual,
            'name_chart' => $this->nameChart,
        ];
    }
}
