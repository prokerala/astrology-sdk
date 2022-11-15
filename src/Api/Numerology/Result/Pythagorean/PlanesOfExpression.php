<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PlanesOfExpression implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param Number    $physical
     * @param Number    $mental
     * @param Number    $emotional
     * @param Number    $spiritual
     * @param NameChart $nameChart
     */
    public function __construct(private $physical, private $mental, private $emotional, private $spiritual, private $nameChart)
    {
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getSpiritual(): Number
    {
        return $this->spiritual;
    }

    public function getMental(): Number
    {
        return $this->mental;
    }

    public function getEmotional(): Number
    {
        return $this->emotional;
    }

    public function getPhysical(): Number
    {
        return $this->physical;
    }
}
