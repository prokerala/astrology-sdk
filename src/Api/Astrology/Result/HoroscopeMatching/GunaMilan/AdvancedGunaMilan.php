<?php

declare(strict_types=1);

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class AdvancedGunaMilan
{
    /**
     * @var float
     */
    private $totalPoints;
    /**
     * @var float
     */
    private $maximumPoints;
    /**
     * @var GunaKoot[]
     */
    private $guna;

    /**
     * AdvancedGunaMilan constructor.
     *
     * @param float      $totalPoints
     * @param float      $maximumPoints
     * @param GunaKoot[] $guna
     */
    public function __construct($totalPoints, $maximumPoints, array $guna)
    {
        $this->totalPoints = $totalPoints;
        $this->maximumPoints = $maximumPoints;
        $this->guna = $guna;
    }

    /**
     * @return float
     */
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * @return float
     */
    public function getMaximumPoints()
    {
        return $this->maximumPoints;
    }

    /**
     * @return GunaKoot[]
     */
    public function getGuna()
    {
        return $this->guna;
    }
}
