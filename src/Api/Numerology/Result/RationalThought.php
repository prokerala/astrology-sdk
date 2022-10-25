<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class RationalThought implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var RationalThoughtNumber
     */
    private $maturityNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param RationalThoughtNumber $rationalThoughtNumber
     * @param NameResult $nameResult
     */
    public function __construct(RationalThoughtNumber $rationalThoughtNumber, NameResult $nameResult) {

        $this->rationalThoughtNumber = $rationalThoughtNumber;
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
     * @return RationalThoughtNumber
     */
    public function getRationalThoughtNumber(): RationalThoughtNumber
    {
        return $this->rationalThoughtNumber;
    }
}
