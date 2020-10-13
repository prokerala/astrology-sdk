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

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class AdvancedSadeSati implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var bool
     */
    private $isInSadeSati;
    /**
     * @var string
     */
    private $transitPhase;
    /**
     * @var string|null
     */
    private $description;

    /**
     * @var SadeSati\SaturnTransit[]
     */
    private $transits;

    /**
     * SadeSati constructor.
     *
     * @param bool                                                               $isInSadeSati
     * @param string|null                                                             $transitPhase
     * @param string                                                             $description
     * @param SadeSati\SaturnTransit[] $transits
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
    public function isInSadeSati()
    {
        return $this->isInSadeSati;
    }

    /**
     * @return string|null
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
     * @return SadeSati\SaturnTransit[]
     */
    public function getTransits()
    {
        return $this->transits;
    }
}
