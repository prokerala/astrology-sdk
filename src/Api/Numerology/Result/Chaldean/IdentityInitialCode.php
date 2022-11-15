<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\NameChart;

class IdentityInitialCode implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private IdentityInitialCodeNumber $identityInitialCodeNumber, private NameChart $nameChart)
    {
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
