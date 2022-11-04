<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SubconsciousSelf implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var SubconsciousSelfNumber
     */
    private $subconsciousSelfNumber;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(SubconsciousSelfNumber $subconsciousSelfNumber, NameChart $nameChart)
    {
        $this->subconsciousSelfNumber = $subconsciousSelfNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getSubconsciousSelfNumber(): SubconsciousSelfNumber
    {
        return $this->subconsciousSelfNumber;
    }
}
