<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class Transit implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Cycle[]
     */
    private $physical;

    /**
     * @var Cycle[]
     */
    private $mental;

    /**
     * @var Cycle[]
     */
    private $spiritual;

    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param int       $id
     * @param string    $title
     * @param Cycle[]   $physical
     * @param Cycle[]   $mental
     * @param Cycle[]   $spiritual
     * @param NameChart $nameChart
     */
    public function __construct($physical, $mental, $spiritual, $nameChart)
    {
        $this->physical = $physical;
        $this->mental = $mental;
        $this->spiritual = $spiritual;
        $this->nameChart = $nameChart;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getPhysical(): array
    {
        return $this->physical;
    }

    public function getMental(): array
    {
        return $this->mental;
    }

    public function getSpiritual(): array
    {
        return $this->spiritual;
    }

    /**
     * @return array{physical: Cycle[], mental: Cycle[], spiritual: Cycle[]}
     *                                                                       //     * @return mixed
     */
    public function jsonSerialize(): array
    {
        return [
            'physical' => $this->physical,
            'mental' => $this->mental,
            'spiritual' => $this->spiritual,
            'name_chart' => $this->nameChart,
        ];
    }
}
