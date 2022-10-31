<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SoulUrge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var SoulUrgeNumber
     */
    private $soulUrgeNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param SoulUrgeNumber $soulUrgeNumber
     * @param NameChart $nameChart
     */
    public function __construct(SoulUrgeNumber $soulUrgeNumber, NameChart $nameChart) {

        $this->soulUrgeNumber = $soulUrgeNumber;
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
     * @return SoulUrgeNumber
     */
    public function getSoulUrgeNumber(): SoulUrgeNumber
    {
        return $this->soulUrgeNumber;
    }
}
