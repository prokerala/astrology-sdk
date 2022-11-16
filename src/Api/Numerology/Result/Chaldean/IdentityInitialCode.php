<?php



namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class IdentityInitialCode implements ResultInterface
{
    use RawResponseTrait;

    private IdentityInitialCodeNumber $identityInitialCodeNumber;

    private NameChart $nameChart;

    public function __construct(IdentityInitialCodeNumber $identityInitialCodeNumber, NameChart $nameChart)
    {
        $this->identityInitialCodeNumber = $identityInitialCodeNumber;
        $this->nameChart = $nameChart;
    }

    public function getNameChart(): NameChart
    {
        return $this->nameChart;
    }

    public function getIdentityInitialCodeNumber(): IdentityInitialCodeNumber
    {
        return $this->identityInitialCodeNumber;
    }
}
