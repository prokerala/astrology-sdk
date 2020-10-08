<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;


use Prokerala\Api\Astrology\Result\Horoscope\SadeSati\SaturnTransit;

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
     * @param bool $isInSadeSati
     * @param string $transitPhase
     * @param string $description
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
