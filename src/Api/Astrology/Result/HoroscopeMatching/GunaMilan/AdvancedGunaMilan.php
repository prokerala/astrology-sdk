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

final class AdvancedGunaMilan
{
    private float $totalPoints;

    private float $maximumPoints;

    /**
     * @var GunaKoot[]
     */
    private array $guna;

    /**
     * AdvancedGunaMilan constructor.
     *
     * @param GunaKoot[] $guna
     */
    public function __construct(float $totalPoints, float $maximumPoints, array $guna)
    {
        $this->totalPoints = $totalPoints;
        $this->maximumPoints = $maximumPoints;
        $this->guna = $guna;
    }

    public function getTotalPoints(): float
    {
        return $this->totalPoints;
    }

    public function getMaximumPoints(): float
    {
        return $this->maximumPoints;
    }

    /**
     * @return GunaKoot[]
     */
    public function getGuna(): array
    {
        return $this->guna;
    }
}
