<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SoulUrge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var SoulUrgeNumber
     */
    private $soulUrgeNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param SoulUrgeNumber $soulUrgeNumber
     * @param NameResult $nameResult
     */
    public function __construct(SoulUrgeNumber $soulUrgeNumber, NameResult $nameResult) {

        $this->soulUrgeNumber = $soulUrgeNumber;
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
     * @return SoulUrgeNumber
     */
    public function getSoulUrgeNumber(): SoulUrgeNumber
    {
        return $this->soulUrgeNumber;
    }
}
