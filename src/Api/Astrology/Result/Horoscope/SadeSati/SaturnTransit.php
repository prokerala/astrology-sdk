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

class SaturnTransit
{
    /**
     * @var string
     */
    private $phase;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * SaturnTransit constructor.
     *
     * @param string $phase
     * @param string $start
     * @param string $end
     */
    public function __construct($phase, $start, $end)
    {
        $this->phase = $phase;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }
}
