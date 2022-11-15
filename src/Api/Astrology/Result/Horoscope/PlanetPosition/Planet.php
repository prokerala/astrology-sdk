<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition;

use Prokerala\Api\Astrology\Result\Element\Rasi;

final class Planet
{
    /**
     * @param int    $id
     * @param string $name
     * @param float  $longitude
     * @param bool   $isRetrograde
     * @param int    $position
     * @param float  $degree
     */
    public function __construct(private $id, private $name, private $longitude, private $isRetrograde, private $position, private $degree, private Rasi $rasi)
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return bool
     */
    public function isRetrograde()
    {
        return $this->isRetrograde;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return float
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return Rasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }
}
