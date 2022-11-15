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

final class SaturnTransit
{
    /**
     * @var null
     */
    private $isRetrograde;

    /**
     * @param string $saturnSign
     * @param string $phase
     * @param string $description
     * @param null   $isRetrograde
     */
    public function __construct(private $saturnSign, private $phase, private \DateTimeInterface $start, private \DateTimeInterface $end, private $description, $isRetrograde = null)
    {
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
     * @return \DateTimeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return \DateTimeInterface
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
