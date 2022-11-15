<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Transit implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param Cycle[]   $physical
     * @param Cycle[]   $mental
     * @param Cycle[]   $spiritual
     * @param NameChart $nameChart
     */
    public function __construct(private $physical, private $mental, private $spiritual, private $nameChart)
    {
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
