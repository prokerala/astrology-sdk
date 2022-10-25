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
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param CornerStoneNumber $cornerStoneNumber
     * @param NameResult $nameResult
     */
    public function __construct(CornerStoneNumber $cornerStoneNumber, NameResult $nameResult) {

        $this->cornerStoneNumber = $cornerStoneNumber;
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
     * @return CornerStoneNumber
     */
    public function getCornerStoneNumber(): CornerStoneNumber
    {
        return $this->cornerStoneNumber;
    }
}
