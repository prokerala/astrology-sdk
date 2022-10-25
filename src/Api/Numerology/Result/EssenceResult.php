<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class EssenceResult
{
    /**
     * @var ArrayNumber
     */
    private $arrayNumber;
    /**
     * @var NameResult $nameResult
     */
    private $nameResult;

    public function __construct($arrayNumber, $nameResult) {
        $this->arrayNumber = $arrayNumber;
        $this->nameResult = $nameResult;
    }

    /**
     * @return ArrayNumber
     */
    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }
}
