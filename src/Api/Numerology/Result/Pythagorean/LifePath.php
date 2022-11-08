<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class LifePath implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var LifePathNumber
     */
    private $lifePathNumber;

    public function __construct(LifePathNumber $lifePathNumber)
    {
        $this->lifePathNumber = $lifePathNumber;
    }

    public function getLifePathNumber(): LifePathNumber
    {
        return $this->lifePathNumber;
    }
}