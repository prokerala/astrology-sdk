<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class Papasamyam implements ResultInterface
{
    use RawResponseTrait;

    private float $totalPoints;

    private PapasamyamDetails $papaSamyam;

    public function __construct(float $totalPoints, PapaSamyamDetails $papaSamyam)
    {
        $this->totalPoints = $totalPoints;
        $this->papaSamyam = $papaSamyam;
    }

    public function getTotalPoints(): float
    {
        return $this->totalPoints;
    }

    public function getPapaSamyam(): PapasamyamDetails
    {
        return $this->papaSamyam;
    }
}
