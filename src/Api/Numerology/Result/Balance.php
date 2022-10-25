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
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param BalanceNumber $balanceNumber
     */
    public function __construct(BalanceNumber $balanceNumber, NameResult $nameResult) {
        $this->balanceNumber = $balanceNumber;
        $this->nameResult = $nameResult;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }

    /**
     * @return BalanceNumber
     */
    public function getBalanceNumber(): BalanceNumber
    {
        return $this->balanceNumber;
    }


}
