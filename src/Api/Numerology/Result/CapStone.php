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

    /**
     * @param CapStoneNumber $capstoneNumber
     * @param NameChart $nameChart
     */
    public function __construct(CapStoneNumber $capstoneNumber, NameChart $nameChart) {

        $this->capstoneNumber = $capstoneNumber;
        $this->nameChart = $nameChart;
    }

    /**
     * @return NameChart
     */
    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return CapStoneNumber
     */
    public function getCapStoneNumber(): CapStoneNumber
    {
        return $this->capstoneNumber;
    }
}
