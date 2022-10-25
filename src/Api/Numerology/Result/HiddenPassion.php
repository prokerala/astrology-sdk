<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class HiddenPassion implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var HiddenPassionNumber
     */
    private $hiddenPassionNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param HiddenPassionNumber $hiddenPassionNumber
     * @param NameResult $nameResult
     */
    public function __construct(HiddenPassionNumber $hiddenPassionNumber, NameResult $nameResult) {

        $this->hiddenPassionNumber = $hiddenPassionNumber;
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
     * @return HiddenPassionNumber
     */
    public function getHiddenPassionNumber(): HiddenPassionNumber
    {
        return $this->hiddenPassionNumber;
    }
}
