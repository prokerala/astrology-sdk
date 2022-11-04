<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Transit implements ResultInterface
{
    use RawResponseTrait;

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

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return Cycle[]
     */
    public function getPhysical(): array
    {
        return $this->physical;
    }

    /**
     * @return Cycle[]
     */
    public function getMental(): array
    {
        return $this->mental;
    }

    /**
     * @return Cycle[]
     */
    public function getSpiritual(): array
    {
        return $this->spiritual;
    }
}
