<?php

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
     * @param int $maximumPoint
     * @param int $obtainedPoint
     */
    public function __construct(
        $maximumPoint,
        $obtainedPoint

    )
    {
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
