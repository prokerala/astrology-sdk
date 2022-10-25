<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Destiny implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DestinyNumber
     */
    private $destinyNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param DestinyNumber $destinyNumber
     * @param NameResult $nameResult
     */
    public function __construct(DestinyNumber $destinyNumber, NameResult $nameResult) {

        $this->destinyNumber = $destinyNumber;
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
     * @return DestinyNumber
     */
    public function getDestinyNumber(): DestinyNumber
    {
        return $this->destinyNumber;
    }
}
