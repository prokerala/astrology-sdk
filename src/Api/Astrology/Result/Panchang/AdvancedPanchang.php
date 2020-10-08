<?php

namespace Prokerala\Api\Astrology\Result\Panchang;


class AdvancedPanchang
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
     * @var AuspiciousPeriod
     */
    private $auspiciousPeriod;
    /**
     * @var InauspiciousPeriod
     */
    private $inauspiciousPeriod;

    /**
     * AdvancedPanchang constructor.
     * @param string $vaara
     * @param \Prokerala\Api\Astrology\Result\Event\Nakshatra[] $nakshatra
     * @param \Prokerala\Api\Astrology\Result\Event\Tithi[] $tithi
     * @param \Prokerala\Api\Astrology\Result\Event\Karana[] $karana
     * @param \Prokerala\Api\Astrology\Result\Event\Yoga[] $yoga
     * @param string $sunrise
     * @param string $sunset
     * @param string $moonrise
     * @param string $moonset
     * @param AuspiciousPeriod $auspiciousPeriod
     * @param InauspiciousPeriod $inauspiciousPeriod
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
        $moonset,
        AuspiciousPeriod $auspiciousPeriod,
        InauspiciousPeriod $inauspiciousPeriod
    )
    {


        $this->vaara = $vaara;
        $this->nakshatra = $nakshatra;
        $this->tithi = $tithi;
        $this->karana = $karana;
        $this->yoga = $yoga;
        $this->sunrise = $sunrise;
        $this->sunset = $sunset;
        $this->moonrise = $moonrise;
        $this->moonset = $moonset;
        $this->auspiciousPeriod = $auspiciousPeriod;
        $this->inauspiciousPeriod = $inauspiciousPeriod;
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

    /**
     * @return AuspiciousPeriod
     */
    public function getAuspiciousPeriod()
    {
        return $this->auspiciousPeriod;
    }

    /**
     * @return InauspiciousPeriod
     */
    public function getInauspiciousPeriod()
    {
        return $this->inauspiciousPeriod;
    }


}
