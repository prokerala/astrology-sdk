<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Birth implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BirthNumber
     */
    private $birthNumber;

    public function __construct(BirthNumber $birthNumber)
    {
        $this->birthNumber = $birthNumber;
    }

    public function getBirthNumber(): BirthNumber
    {
        return $this->birthNumber;
    }
}
