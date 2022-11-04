<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Attainment implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var AttainmentNumber
     */
    private $attainmentNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(AttainmentNumber $attainmentNumber, NameChart $nameChart)
    {
        $this->attainmentNumber = $attainmentNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getAttainmentNumber(): AttainmentNumber
    {
        return $this->attainmentNumber;
    }
}
