<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile;

class Porutham
{

    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile
     */
    private $girlInfo;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile
     */
    private $boyInfo;
    /**
     * @var int
     */
    private $maximumPoint;
    /**
     * @var float
     */
    private $totalPoint;
    /**
     * @var string
     */
    private $compatibility;

    /**
     * Porutham constructor.
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile $girlInfo
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile $boyInfo
     * @param int $maximumPoint
     * @param float $totalPoint
     * @param string $compatibility
     */
    public function __construct(
         Profile $girlInfo,
         Profile $boyInfo,
         $maximumPoint,
         $totalPoint,
         $compatibility
    )
    {
        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->maximumPoint = $maximumPoint;
        $this->totalPoint = $totalPoint;
        $this->compatibility = $compatibility;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile
     */
    public function getGirlInfo()
    {
        return $this->girlInfo;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile
     */
    public function getBoyInfo()
    {
        return $this->boyInfo;
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
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @return string
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

}
