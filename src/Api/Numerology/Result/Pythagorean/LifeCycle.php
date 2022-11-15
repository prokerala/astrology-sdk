<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class LifeCycle implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private LifeCycleNumber $lifeCycle)
    {
    }

    public function getLifeCycleNumber(): LifeCycleNumber
    {
        return $this->lifeCycle;
    }
}
