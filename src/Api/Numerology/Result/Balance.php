<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Balance implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BalanceNumber
     */
    private $balanceNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    /**
     * @param BalanceNumber $balanceNumber
     */
    public function __construct(BalanceNumber $balanceNumber, NameChart $nameChart) {
        $this->balanceNumber = $balanceNumber;
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
     * @return BalanceNumber
     */
    public function getBalanceNumber(): BalanceNumber
    {
        return $this->balanceNumber;
    }


}
