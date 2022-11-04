<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Bridge implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BridgeNumber
     */
    private $bridgeNumber;

    public function __construct(BridgeNumber $bridgeNumber)
    {
        $this->bridgeNumber = $bridgeNumber;
    }

    public function getBridgeNumber(): BridgeNumber
    {
        return $this->bridgeNumber;
    }
}
