<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;

final class PapaPlanet
{
    /**
     * PapaPlanet constructor.
     *
     * @param string               $name
     * @param PlanetDoshaDetails[] $planetDosha
     */
    public function __construct(private $name, private array $planetDosha)
    {
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return PlanetDoshaDetails[]
     */
    public function getPlanetDosha()
    {
        return $this->planetDosha;
    }
}
