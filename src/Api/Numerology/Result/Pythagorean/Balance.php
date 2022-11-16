<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Balance implements ResultInterface
{
    use RawResponseTrait;

    private BalanceNumber $balanceNumber;

    private NameChart $nameChart;

    public function __construct(BalanceNumber $balanceNumber, NameChart $nameChart)
    {
        $this->balanceNumber = $balanceNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getBalanceNumber(): BalanceNumber
    {
        return $this->balanceNumber;
    }
}
