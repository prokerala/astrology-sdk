<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class GunaKoot
{


    /**
     * @var float
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
     * @param float $maximumPoint
     * @param float $obtainedPoint
     * @param string $message
     */
    public function __construct($maximumPoint, $obtainedPoint, $message) {

        $this->maximumPoint = $maximumPoint;
        $this->obtainedPoint = $obtainedPoint;
        $this->message = $message;
    }

    /**
     * @return float
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
