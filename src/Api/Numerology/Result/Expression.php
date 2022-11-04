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
     * @var NameChart
     */
    private $nameChart;

    public function __construct(ExpressionNumber $expressionNumber, NameChart $nameChart)
    {
        $this->expressionNumber = $expressionNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getExpressionNumber(): ExpressionNumber
    {
        return $this->expressionNumber;
    }
}
