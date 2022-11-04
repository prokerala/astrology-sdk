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
    private $nameResult;

    public function __construct(CornerStoneNumber $cornerStoneNumber, NameChart $nameResult)
    {
        $this->cornerStoneNumber = $cornerStoneNumber;
        $this->nameResult = $nameResult;
    }

    public function getNameResult(): NameChart
    {
        return $this->nameResult;
    }

    public function getCornerStoneNumber(): CornerStoneNumber
    {
        return $this->cornerStoneNumber;
    }
}
