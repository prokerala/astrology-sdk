<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

class NakshatraPorutham
{
    /**
     * @var int
     */
    private $maximumPoint;
    /**
     * @var int
     */
    private $obtainedPoint;

    /**
     * NakshatraPorutham constructor.
     *
     * @param int $maximumPoint
     * @param int $obtainedPoint
     */
    public function __construct(
        $maximumPoint,
        $obtainedPoint
    ) {
        $this->maximumPoint = $maximumPoint;
        $this->obtainedPoint = $obtainedPoint;
    }

    /**
     * @return int
     */
    public function getMaximumPoint()
    {
        return $this->maximumPoint;
    }

    /**
     * @return int
     */
    public function getObtainedPoint()
    {
        return $this->obtainedPoint;
    }
}
