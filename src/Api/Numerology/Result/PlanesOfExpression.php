<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PlanesOfExpression implements JsonSerializable
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
     * @param Number $physical
     * @param Number $mental
     * @param Number $emotional
     * @param Number $spiritual
     * @param NameChart $nameChart
     */
    public function __construct( $physical, $mental, $emotional, $spiritual, $nameChart)
    {
        $this->physical = $physical;
        $this->mental = $mental;
        $this->emotional = $emotional;
        $this->spiritual = $spiritual;
        $this->nameChart = $nameChart;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return Number
     */
    public function getSpiritual(): Number
    {
        return $this->spiritual;
    }

    /**
     * @return Number
     */
    public function getMental(): Number
    {
        return $this->mental;
    }

    /**
     * @return Number
     */
    public function getEmotional(): Number
    {
        return $this->emotional;
    }

    /**
     * @return Number
     */
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
