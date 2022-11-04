<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class RationalThought implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var RationalThoughtNumber
     */
    private $maturityNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param RationalThoughtNumber $rationalThoughtNumber
     * @param NameChart $nameChart
     */
    public function __construct(RationalThoughtNumber $rationalThoughtNumber, NameChart $nameChart) {

        $this->rationalThoughtNumber = $rationalThoughtNumber;
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
     * @return RationalThoughtNumber
     */
    public function getRationalThoughtNumber(): RationalThoughtNumber
    {
        return $this->rationalThoughtNumber;
    }
}
