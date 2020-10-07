<?php

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
     * @param float $totalPoint
     * @param int $maximumPoint
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
