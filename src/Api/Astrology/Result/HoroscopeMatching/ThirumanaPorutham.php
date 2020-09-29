<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham;

class ThirumanaPorutham
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
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $dinaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $ganaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $mahendraPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $streeDhrirghamPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $yoniPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $rasiPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $rasiLordPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $rajjuPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $vedaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $vashyaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $nadiPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    private $varnaPorutham;

    /**
     * ThirumanaPorutham constructor.
     * @param int $maximumPoint
     * @param int $obtainedPoint
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $dinaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $ganaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $mahendraPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $streeDhrirghamPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $yoniPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $rasiPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $rasiLordPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $rajjuPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $vedaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $vashyaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $nadiPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham $varnaPorutham
     */
    public function __construct(
         $maximumPoint,
         $obtainedPoint,
         Porutham $dinaPorutham,
         Porutham $ganaPorutham,
         Porutham $mahendraPorutham,
         Porutham $streeDhrirghamPorutham,
         Porutham $yoniPorutham,
         Porutham $rasiPorutham,
         Porutham $rasiLordPorutham,
         Porutham $rajjuPorutham,
         Porutham $vedaPorutham,
         Porutham $vashyaPorutham,
         Porutham $nadiPorutham,
         Porutham $varnaPorutham
    )
    {

        $this->maximumPoint = $maximumPoint;
        $this->obtainedPoint = $obtainedPoint;
        $this->dinaPorutham = $dinaPorutham;
        $this->ganaPorutham = $ganaPorutham;
        $this->mahendraPorutham = $mahendraPorutham;
        $this->streeDhrirghamPorutham = $streeDhrirghamPorutham;
        $this->yoniPorutham = $yoniPorutham;
        $this->rasiPorutham = $rasiPorutham;
        $this->rasiLordPorutham = $rasiLordPorutham;
        $this->rajjuPorutham = $rajjuPorutham;
        $this->vedaPorutham = $vedaPorutham;
        $this->vashyaPorutham = $vashyaPorutham;
        $this->nadiPorutham = $nadiPorutham;
        $this->varnaPorutham = $varnaPorutham;
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

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getDinaPorutham()
    {
        return $this->dinaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getGanaPorutham()
    {
        return $this->ganaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getMahendraPorutham()
    {
        return $this->mahendraPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getStreeDhrirghamPorutham()
    {
        return $this->streeDhrirghamPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getYoniPorutham()
    {
        return $this->yoniPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getRasiPorutham()
    {
        return $this->rasiPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getRasiLordPorutham()
    {
        return $this->rasiLordPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getRajjuPorutham()
    {
        return $this->rajjuPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getVedaPorutham()
    {
        return $this->vedaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getVashyaPorutham()
    {
        return $this->vashyaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getNadiPorutham()
    {
        return $this->nadiPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham\Porutham
     */
    public function getVarnaPorutham()
    {
        return $this->varnaPorutham;
    }
}
