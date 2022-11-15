<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class LifePath implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private LifePathNumber $lifePathNumber)
    {
    }

    public function getLifePathNumber(): LifePathNumber
    {
        return $this->lifePathNumber;
    }
}
