<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result;

final class Planet
{
    public const SUN = 0;
    public const MOON = 1;
    public const MERCURY = 2;
    public const VENUS = 3;
    public const MARS = 4;
    public const JUPITER = 5;
    public const SATURN = 6;
    public const RAHU = 101;
    public const KETU = 102;
    public const ASCENDANT = 100;

    public const PLANET_LIST = [
        0 => 'Sun', 1 => 'Moon', 2 => 'Mercury', 3 => 'Venus', 4 => 'Mars',
        5 => 'Jupiter', 6 => 'Saturn', 101 => 'Rahu', 102 => 'Ketu', 100 => 'Ascendant',
    ];

    /**
     * @param int    $id
     * @param string $name
     * @param float  $longitude
     * @param bool $isReverse
     * @param int    $position
     * @param string $degree
     * @param int    $rasi
     * @param string $rasiLord
     */
    public function __construct(private $id, private $name, private $longitude, private $isReverse, private $position, private $degree, private $rasi, private $rasiLord)
    {
    }

    /**
     * Get planet name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get planet id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get planet longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Check whether the planet is in retrograde motion.
     *
     * @return bool
     */
    public function isRetrograde()
    {
        return $this->isReverse;
    }

    /**
     * Get planet position.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get longitude degree.
     *
     * @return string
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Get planet rasi.
     *
     * @return string
     */
    public function getRasi()
    {
        return $this->rasi;
    }

    /**
     * Get complete planet list.
     *
     * @return string[]
     */
    public function getPlanetList()
    {
        return self::PLANET_LIST;
    }
}
