<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Maturity implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var MaturityNumber
     */
    private $maturityNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(MaturityNumber $maturityNumber, NameChart $nameChart)
    {
        $this->maturityNumber = $maturityNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getMaturityNumber(): MaturityNumber
    {
        return $this->maturityNumber;
    }
}
