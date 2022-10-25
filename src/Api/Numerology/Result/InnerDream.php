<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class InnerDream implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var InnerDreamNumber
     */
    private $innerDreamNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param InnerDreamNumber $innerDreamNumber
     * @param NameResult $nameResult
     */
    public function __construct(InnerDreamNumber $innerDreamNumber, NameResult $nameResult) {

        $this->innerDreamNumber = $innerDreamNumber;
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
     * @return InnerDreamNumber
     */
    public function getInnerDreamNumber(): InnerDreamNumber
    {
        return $this->innerDreamNumber;
    }
}
