<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

class AdvancedSadeSati
{
    /**
     * @var bool
     */
    private $isInSadeSati;
    /**
     * @var string
     */
    private $transitPhase;
    /**
     * @var string
     */
    private $description;

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\SadeSati\SaturnTransit[]
     */
    private $transits;

    /**
     * SadeSati constructor.
     *
     * @param bool                                                               $isInSadeSati
     * @param string                                                             $transitPhase
     * @param string                                                             $description
     * @param \Prokerala\Api\Astrology\Result\Horoscope\SadeSati\SaturnTransit[] $transits
     */
    public function __construct($isInSadeSati, $transitPhase, $description, array $transits)
    {
        $this->isInSadeSati = $isInSadeSati;
        $this->transitPhase = $transitPhase;
        $this->description = $description;
        $this->transits = $transits;
    }

    /**
     * @return bool
     */
    public function getIsInSadeSati()
    {
        return $this->isInSadeSati;
    }

    /**
     * @return string
     */
    public function getTransitPhase()
    {
        return $this->transitPhase;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\SadeSati\SaturnTransit[]
     */
    public function getTransits()
    {
        return $this->transits;
    }
}
