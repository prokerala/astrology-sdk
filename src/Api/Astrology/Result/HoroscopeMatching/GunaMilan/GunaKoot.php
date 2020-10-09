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

class GunaKoot
{
    /**
     * @var int
     */
    private $maximumPoint;
    /**
     * @var float
     */
    private $obtainedPoint;
    /**
     * @var string
     */
    private $message;

    /**
     * GunaKoot constructor.
     *
     * @param int    $maximumPoint
     * @param float  $obtainedPoint
     * @param string $message
     */
    public function __construct($maximumPoint, $obtainedPoint, $message)
    {
        $this->maximumPoint = $maximumPoint;
        $this->obtainedPoint = $obtainedPoint;
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getMaximumPoint()
    {
        return $this->maximumPoint;
    }

    /**
     * @return float
     */
    public function getObtainedPoint()
    {
        return $this->obtainedPoint;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
