<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class CapStone implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var CapStoneNumber
     */
    private $capstoneNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param CapStoneNumber $capstoneNumber
     * @param NameResult $nameResult
     */
    public function __construct(CapStoneNumber $capstoneNumber, NameResult $nameResult) {

        $this->capstoneNumber = $capstoneNumber;
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
     * @return CapStoneNumber
     */
    public function getCapStoneNumber(): CapStoneNumber
    {
        return $this->capstoneNumber;
    }
}
