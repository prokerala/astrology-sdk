<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult;

class Porutham
{

    /**
     * @var float
     */
    private $totalPoint;
    /**
     * @var string
     */
    private $compatibility;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $dinaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $ganaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $mahendraPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $rajjuPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $rasiPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $rasyadhipaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $streeDhrirghamPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $vasyaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $vedaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    private $yoniPorutham;

    /**
     * Porutham constructor.
     * @param float $totalPoint
     * @param string $compatibility
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $dinaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $ganaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $mahendraPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $rajjuPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $rasiPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $rasyadhipaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $streeDhrirghamPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $vasyaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $vedaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult $yoniPorutham
     */
    public function __construct(
         $totalPoint,
         $compatibility,
         PoruthamResult $dinaPorutham,
         PoruthamResult $ganaPorutham,
         PoruthamResult $mahendraPorutham,
         PoruthamResult $rajjuPorutham,
         PoruthamResult $rasiPorutham,
         PoruthamResult $rasyadhipaPorutham,
         PoruthamResult $streeDhrirghamPorutham,
         PoruthamResult $vasyaPorutham,
         PoruthamResult $vedaPorutham,
         PoruthamResult $yoniPorutham

    )
    {

        $this->totalPoint = $totalPoint;
        $this->compatibility = $compatibility;
        $this->dinaPorutham = $dinaPorutham;
        $this->ganaPorutham = $ganaPorutham;
        $this->mahendraPorutham = $mahendraPorutham;
        $this->rajjuPorutham = $rajjuPorutham;
        $this->rasiPorutham = $rasiPorutham;
        $this->rasyadhipaPorutham = $rasyadhipaPorutham;
        $this->streeDhrirghamPorutham = $streeDhrirghamPorutham;
        $this->vasyaPorutham = $vasyaPorutham;
        $this->vedaPorutham = $vedaPorutham;
        $this->yoniPorutham = $yoniPorutham;
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

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getDinaPorutham()
    {
        return $this->dinaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getGanaPorutham()
    {
        return $this->ganaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getMahendraPorutham()
    {
        return $this->mahendraPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getRajjuPorutham()
    {
        return $this->rajjuPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getRasiPorutham()
    {
        return $this->rasiPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getRasyadhipaPorutham()
    {
        return $this->rasyadhipaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getStreeDhrirghamPorutham()
    {
        return $this->streeDhrirghamPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getVasyaPorutham()
    {
        return $this->vasyaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getVedaPorutham()
    {
        return $this->vedaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult
     */
    public function getYoniPorutham()
    {
        return $this->yoniPorutham;
    }

}
