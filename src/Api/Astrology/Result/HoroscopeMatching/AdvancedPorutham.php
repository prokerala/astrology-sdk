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

use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\PoruthamResult;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile;

class AdvancedPorutham
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
     * AdvancedPorutham constructor.
     *
     * @param int    $maximumPoint
     * @param float  $totalPoint
     * @param string $compatibility
     */
    public function __construct(
        Profile $girlInfo,
        Profile $boyInfo,
        $maximumPoint,
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
    ) {
        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->maximumPoint = $maximumPoint;
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
