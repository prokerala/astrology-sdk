<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Cornerstone implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var CornerstoneNumber
     */
    private $cornerstoneNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(CornerstoneNumber $cornerstoneNumber, NameChart $nameChart)
    {
        $this->cornerstoneNumber = $cornerstoneNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getCornerstoneNumber(): CornerstoneNumber
    {
        return $this->cornerstoneNumber;
    }
}