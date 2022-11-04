<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class CapStone implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var CapStoneNumber
     */
    private $capstoneNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(CapStoneNumber $capstoneNumber, NameChart $nameChart)
    {
        $this->capstoneNumber = $capstoneNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getCapStoneNumber(): CapStoneNumber
    {
        return $this->capstoneNumber;
    }
}
