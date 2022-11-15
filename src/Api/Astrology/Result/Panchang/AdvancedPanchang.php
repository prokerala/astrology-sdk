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

final class AdvancedPanchang implements ResultInterface
{
    use RawResponseTrait;

    /**
     * AdvancedPanchang constructor.
     *
     * @param string                                                  $vaara
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Nakshatra[] $nakshatra
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Tithi[]     $tithi
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Karana[]    $karana
     * @param \Prokerala\Api\Astrology\Result\EventTiming\Yoga[]      $yoga
     * @param Muhurat\Muhurat[]                                       $auspiciousPeriod
     * @param Muhurat\Muhurat[]                                       $inauspiciousPeriod
     */
    public function __construct(private $vaara, private array $nakshatra, private array $tithi, private array $karana, private array $yoga, private \DateTimeInterface $sunrise, private \DateTimeInterface $sunset, private \DateTimeInterface $moonrise, private \DateTimeInterface $moonset, private $auspiciousPeriod, private $inauspiciousPeriod)
    {
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

    /**
     * @return Muhurat\Muhurat[]
     */
    public function getAuspiciousPeriod()
    {
        return $this->auspiciousPeriod;
    }

    /**
     * @return Muhurat\Muhurat[]
     */
    public function getInauspiciousPeriod()
    {
        return $this->inauspiciousPeriod;
    }
}
