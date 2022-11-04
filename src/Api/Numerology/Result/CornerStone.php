<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class CornerStone implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var CornerStoneNumber
     */
    private $cornerStoneNumber;
    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param CornerStoneNumber $cornerStoneNumber
     * @param NameChart $nameChart
     */
    public function __construct(CornerStoneNumber $cornerStoneNumber, NameChart $nameChart) {

        $this->cornerStoneNumber = $cornerStoneNumber;
        $this->nameResult = $nameChart;
    }

    /**
     * @return NameChart
     */
    public function getNameResult(): NameChart
    {
        return $this->nameResult;
    }

    /**
     * @return CornerStoneNumber
     */
    public function getCornerStoneNumber(): CornerStoneNumber
    {
        return $this->cornerStoneNumber;
    }
}
