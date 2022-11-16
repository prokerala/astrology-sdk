<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Bridge implements ResultInterface
{
    use RawResponseTrait;

    private BridgeNumber $bridgeNumber;

    public function __construct(BridgeNumber $bridgeNumber)
    {
        $this->bridgeNumber = $bridgeNumber;
    }

    public function getBridgeNumber(): BridgeNumber
    {
        return $this->bridgeNumber;
    }
}
