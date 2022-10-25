<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Attainment implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Attainment
     */
    private $attainmentNumber;

    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param Attainment $attainmentNumber
     */
    public function __construct(AttainmentNumber $attainmentNumber, NameResult $nameResult) {
        $this->attainmentNumber = $attainmentNumber;
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
     * @return AttainmentNumber
     */
    public function getAttainmentNumber(): AttainmentNumber
    {
        return $this->attainmentNumber;
    }


}
