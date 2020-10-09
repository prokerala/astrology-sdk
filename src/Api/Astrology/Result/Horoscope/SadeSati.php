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

class SadeSati
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
     * SadeSati constructor.
     *
     * @param bool   $isInSadeSati
     * @param string $transitPhase
     * @param string $description
     */
    public function __construct($isInSadeSati, $transitPhase, $description)
    {
        $this->isInSadeSati = $isInSadeSati;
        $this->transitPhase = $transitPhase;
        $this->description = $description;
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
}
