<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Destiny implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DestinyNumber
     */
    private $destinyNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param DestinyNumber $destinyNumber
     * @param NameChart $nameChart
     */
    public function __construct(DestinyNumber $destinyNumber, NameChart $nameChart) {

        $this->destinyNumber = $destinyNumber;
        $this->nameChart = $nameChart;
    }

    /**
     * @return NameChart
     */
    public function getNameResult(): NameChart
    {
        return $this->nameChart;
    }

    /**
     * @return DestinyNumber
     */
    public function getDestinyNumber(): DestinyNumber
    {
        return $this->destinyNumber;
    }
}
