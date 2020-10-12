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

class Planet
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var float */
    private $longitude;
    /** @var bool */
    private $isReverse;
    /** @var int */
    private $position;
    /** @var float */
    private $degree;
    /** @var string */
    private $rasi;
    /** @var string */
    private $rasiLord;
    /** @var string */
    private $rasiLordEn;

    /**
     * @param int    $id
     * @param string $name
     * @param float  $longitude
     * @param bool   $isReverse
     * @param int    $position
     * @param float  $degree
     * @param string $rasi
     * @param string $rasiLord
     * @param string $rasiLordEn
     */
    public function __construct(
        $id,
        $name,
        $longitude,
        $isReverse,
        $position,
        $degree,
        $rasi,
        $rasiLord,
        $rasiLordEn
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->longitude = $longitude;
        $this->isReverse = $isReverse;
        $this->position = $position;
        $this->degree = $degree;
        $this->rasi = $rasi;
        $this->rasiLord = $rasiLord;
        $this->rasiLordEn = $rasiLordEn;
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
    public function getIsReverse()
    {
        return $this->isReverse;
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
     * @return string
     */
    public function getRasi()
    {
        return $this->rasi;
    }

    /**
     * @return string
     */
    public function getRasiLord()
    {
        return $this->rasiLord;
    }

    /**
     * @return string
     */
    public function getRasiLordEn()
    {
        return $this->rasiLordEn;
    }
}
