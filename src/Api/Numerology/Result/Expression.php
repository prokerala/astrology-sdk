<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Expression implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ExpressionNumber
     */
    private $expressionNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param ExpressionNumber $expressionNumber
     * @param NameResult $nameResult
     */
    public function __construct(ExpressionNumber $expressionNumber, NameResult $nameResult) {

        $this->expressionNumber = $expressionNumber;
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
     * @return ExpressionNumber
     */
    public function getExpressionNumber(): ExpressionNumber
    {
        return $this->expressionNumber;
    }
}
