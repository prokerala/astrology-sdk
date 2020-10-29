<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\SadeSati;

use DateTimeInterface;

class SaturnTransit
{
    /**
     * @var string
     */
    private $saturnSign;
    /**
     * @var string
     */
    private $phase;
    /**
     * @var DateTimeInterface
     */
    private $start;
    /**
     * @var DateTimeInterface
     */
    private $end;
    /**
     * @var string
     */
    private $description;
    /**
     * @var null
     */
    private $isRetrograde;

    /**
     * SaturnTransit constructor.
     *
     * @param string $saturnSign
     * @param string $phase
     * @param string $description
     * @param null   $isRetrograde
     */
    public function __construct($saturnSign, $phase, DateTimeInterface $start, DateTimeInterface $end, $description, $isRetrograde = null)
    {
        $this->saturnSign = $saturnSign;
        $this->phase = $phase;
        $this->start = $start;
        $this->end = $end;
        $this->description = $description;
        $this->isRetrograde = $isRetrograde;
    }

    /**
     * @return string
     */
    public function getSaturnSign()
    {
        return $this->saturnSign;
    }

    /**
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return null
     */
    public function isRetrograde()
    {
        return $this->isRetrograde;
    }
}
