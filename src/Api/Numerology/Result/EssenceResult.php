<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class EssenceResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ArrayNumber
     */
    private $arrayNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(ArrayNumber $arrayNumber, NameChart $nameChart)
    {
        $this->arrayNumber = $arrayNumber;
        $this->nameChart = $nameChart;
    }

    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }
}
