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

class GunaMilan
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
     * GunaMilan constructor.
     * @param float $totalPoints
     * @param float $maximumPoints
     */
    public function __construct(
        $totalPoints,
        $maximumPoints
    ) {


        $this->totalPoints = $totalPoints;
        $this->maximumPoints = $maximumPoints;
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



}
