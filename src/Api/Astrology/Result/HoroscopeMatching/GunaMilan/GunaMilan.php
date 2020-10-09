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
    private $totalPoint;
    /**
     * @var int
     */
    private $maximumPoint;

    /**
     * GunaMilan constructor.
     *
     * @param float $totalPoint
     * @param int   $maximumPoint
     */
    public function __construct(
        $totalPoint,
        $maximumPoint
    ) {
        $this->totalPoint = $totalPoint;
        $this->maximumPoint = $maximumPoint;
    }

    /**
     * @return float
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @return int
     */
    public function getMaximumPoint()
    {
        return $this->maximumPoint;
    }
}
