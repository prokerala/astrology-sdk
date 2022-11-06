<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

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

    public function __construct(DestinyNumber $destinyNumber, NameChart $nameChart)
    {
        $this->destinyNumber = $destinyNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getDestinyNumber(): DestinyNumber
    {
        return $this->destinyNumber;
    }
}
