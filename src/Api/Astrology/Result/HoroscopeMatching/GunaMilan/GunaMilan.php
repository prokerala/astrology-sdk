<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

final class GunaMilan
{
    private float $totalPoints;

    private float $maximumPoints;

    /**
     * GunaMilan constructor.
     */
    public function __construct(
        float $totalPoints,
        float $maximumPoints
    ) {
        $this->totalPoints = $totalPoints;
        $this->maximumPoints = $maximumPoints;
    }

    public function getTotalPoints(): float
    {
        return $this->totalPoints;
    }

    public function getMaximumPoints(): float
    {
        return $this->maximumPoints;
    }
}
