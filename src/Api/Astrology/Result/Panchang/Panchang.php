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

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class Panchang implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var string
     */
    private $vaara;

    /**
     * @var \Prokerala\Api\Astrology\Result\EventTiming\Nakshatra[]
     */
    private $nakshatra;

    /**
     * @var \Prokerala\Api\Astrology\Result\EventTiming\Tithi[]
     */
    private $tithi;

    /**
     * @var \Prokerala\Api\Astrology\Result\EventTiming\Karana[]
     */
    private $karana;

    /**
     * @var \Prokerala\Api\Astrology\Result\EventTiming\Yoga[]
     */
    private $yoga;

    /**
     * @var \DateTimeInterface
     */
    private $sunrise;

    /**
     * @var \DateTimeInterface
     */
    private $sunset;

    /**
     * @var \DateTimeInterface
     */
    private $moonrise;

    /**
     * @var \DateTimeInterface
     */
    private $moonset;

    /**
     * Panchang constructor.
     *
     * @param string                                                  $vaara
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Nakshatra[] $nakshatra
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Tithi[]     $tithi
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Karana[]    $karana
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Yoga[]      $yoga
     */
    public function __construct(
        $vaara,
        array $nakshatra,
        array $tithi,
        array $karana,
        array $yoga,
        \DateTimeInterface $sunrise,
        \DateTimeInterface $sunset,
        \DateTimeInterface $moonrise,
        \DateTimeInterface $moonset
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
     * @return \Prokerala\Api\Astrology\Result\EventTiming\Nakshatra[]
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\EventTiming\Tithi[]
     */
    public function getTithi()
    {
        return $this->tithi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\EventTiming\Karana[]
     */
    public function getKarana()
    {
        return $this->karana;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\EventTiming\Yoga[]
     */
    public function getYoga()
    {
        return $this->yoga;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getSunrise()
    {
        return $this->sunrise;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getSunset()
    {
        return $this->sunset;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getMoonrise()
    {
        return $this->moonrise;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getMoonset()
    {
        return $this->moonset;
    }
}
