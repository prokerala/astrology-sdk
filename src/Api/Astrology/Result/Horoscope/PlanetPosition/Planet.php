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
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var bool
     */
    private $isRetrograde;

    /**
     * @var int
     */
    private $position;

    /**
     * @var float
     */
    private $degree;

    /**
     * @var Rasi
     */
    private $rasi;

    /**
     * @param int    $id
     * @param string $name
     * @param float  $longitude
     * @param bool   $isRetrograde
     * @param int    $position
     * @param float  $degree
     */
    public function __construct(
        $id,
        $name,
        $longitude,
        $isRetrograde,
        $position,
        $degree,
        Rasi $rasi
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->longitude = $longitude;
        $this->isRetrograde = $isRetrograde;
        $this->position = $position;
        $this->degree = $degree;
        $this->rasi = $rasi;
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
