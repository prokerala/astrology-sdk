<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Pinnacle implements ResultInterface
{
    use RawResponseTrait;

    private PinnacleNumber $pinnacleNumber;

    public function __construct(PinnacleNumber $pinnacleNumber)
    {
        $this->pinnacleNumber = $pinnacleNumber;
    }

    public function getPinnacleNumber(): PinnacleNumber
    {
        return $this->pinnacleNumber;
    }
}
