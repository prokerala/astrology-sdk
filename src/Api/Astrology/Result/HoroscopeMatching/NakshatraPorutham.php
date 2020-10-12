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

use Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham;

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
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $dinaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $ganaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $mahendraPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $streeDhrirghamPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $yoniPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $rasiPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $rasiLordPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $rajjuPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $vedaPorutham;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    private $vashyaPorutham;

    /**
     * NakshatraPorutham constructor.
     *
     * @param int $maximumPoint
     * @param int $obtainedPoint
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $dinaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $ganaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $mahendraPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $streeDhrirghamPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $yoniPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $rasiPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $rasiLordPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $rajjuPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $vedaPorutham
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham $vashyaPorutham
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
        Porutham $vashyaPorutham
    ) {
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
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getDinaPorutham()
    {
        return $this->dinaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getGanaPorutham()
    {
        return $this->ganaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getMahendraPorutham()
    {
        return $this->mahendraPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getStreeDhrirghamPorutham()
    {
        return $this->streeDhrirghamPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getYoniPorutham()
    {
        return $this->yoniPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getRasiPorutham()
    {
        return $this->rasiPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getRasiLordPorutham()
    {
        return $this->rasiLordPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getRajjuPorutham()
    {
        return $this->rajjuPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getVedaPorutham()
    {
        return $this->vedaPorutham;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\NakshatraPorutham\Porutham
     */
    public function getVashyaPorutham()
    {
        return $this->vashyaPorutham;
    }
}
