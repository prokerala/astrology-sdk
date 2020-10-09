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

/**
 * Defines Planet Position.
 */
class PlanetPosition
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    private $planetPosition;

    /**
     * PlanetPosition constructor.
     *
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct(array $planetPosition)
    {
        $this->planetPosition = $planetPosition;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    public function getPlanetPosition()
    {
        return $this->planetPosition;
    }
}
