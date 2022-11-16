<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SubconsciousSelf implements ResultInterface
{
    use RawResponseTrait;

    private SubconsciousSelfNumber $subconsciousSelfNumber;

    private NameChart $nameChart;

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
