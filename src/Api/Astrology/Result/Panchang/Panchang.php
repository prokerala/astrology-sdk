<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

class Panchang
{
    /**
     * @var string
     */
    private $vaara;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\Nakshatra[]
     */
    private $nakshatra;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\Tithi[]
     */
    private $tithi;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\Karana[]
     */
    private $karana;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\Yoga[]
     */
    private $yoga;
    /**
     * @var string
     */
    private $sunrise;
    /**
     * @var string
     */
    private $sunset;
    /**
     * @var string
     */
    private $moonrise;
    /**
     * @var string
     */
    private $moonset;

    /**
     * Panchang constructor.
     *
     * @param string                                            $vaara
     * @param \Prokerala\Api\Astrology\Result\Event\Nakshatra[] $nakshatra
     * @param \Prokerala\Api\Astrology\Result\Event\Tithi[]     $tithi
     * @param \Prokerala\Api\Astrology\Result\Event\Karana[]    $karana
     * @param \Prokerala\Api\Astrology\Result\Event\Yoga[]      $yoga
     * @param string                                            $sunrise
     * @param string                                            $sunset
     * @param string                                            $moonrise
     * @param string                                            $moonset
     */
    public function __construct(
        $vaara,
        array $nakshatra,
        array $tithi,
        array $karana,
        array $yoga,
        $sunrise,
        $sunset,
        $moonrise,
        $moonset
    ) {
        $this->vaara = $vaara;
        $this->nakshatra = $nakshatra;
        $this->tithi = $tithi;
        $this->karana = $karana;
        $this->yoga = $yoga;
        $this->sunrise = $sunrise;
        $this->sunset = $sunset;
        $this->moonrise = $moonrise;
        $this->moonset = $moonset;
    }

    /**
     * @return string
     */
    public function getVaara()
    {
        return $this->vaara;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\Nakshatra[]
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\Tithi[]
     */
    public function getTithi()
    {
        return $this->tithi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\Karana[]
     */
    public function getKarana()
    {
        return $this->karana;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\Yoga[]
     */
    public function getYoga()
    {
        return $this->yoga;
    }

    /**
     * @return string
     */
    public function getSunrise()
    {
        return $this->sunrise;
    }

    /**
     * @return string
     */
    public function getSunset()
    {
        return $this->sunset;
    }

    /**
     * @return string
     */
    public function getMoonrise()
    {
        return $this->moonrise;
    }

    /**
     * @return string
     */
    public function getMoonset()
    {
        return $this->moonset;
    }
}
