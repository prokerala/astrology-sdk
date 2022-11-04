<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class Transit implements JsonSerializable
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $title
     */
    private $title;
    /**
     * @var Cycle[] $physical
     */
    private $physical;
    /**
     * @var Cycle[] $mental
     */
    private $mental;
    /**
     * @var Cycle[] $spiritual
     */
    private $spiritual;
    /**
     * @var NameChart $nameChart
     */
    private $nameChart;

    /**
     * @param int $id
     * @param string $title
     * @param Cycle[] $physical
     * @param Cycle[] $mental
     * @param Cycle[] $spiritual
     * @param NameChart $nameChart
     */
    public function __construct($physical, $mental, $spiritual, $nameChart){
        $this->physical = $physical;
        $this->mental = $mental;
        $this->spiritual = $spiritual;
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
     * @return array
     */
    public function getPhysical(): array
    {
        return $this->physical;
    }

    /**
     * @return array
     */
    public function getMental(): array
    {
        return $this->mental;
    }

    /**
     * @return array
     */
    public function getSpiritual(): array
    {
        return $this->spiritual;
    }

    /**
     * @return array{physical: Cycle[], mental: Cycle[], spiritual: Cycle[]}
//     * @return mixed
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
