<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Expression implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private ExpressionNumber $expressionNumber, private NameChart $nameChart)
    {
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
