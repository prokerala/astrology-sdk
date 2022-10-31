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

    /**
     * @param MaturityNumber $maturityNumber
     * @param NameChart $nameChart
     */
    public function __construct(MaturityNumber $maturityNumber, NameChart $nameChart) {

        $this->maturityNumber = $maturityNumber;
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
     * @return MaturityNumber
     */
    public function getMaturityNumber(): MaturityNumber
    {
        return $this->maturityNumber;
    }
}
