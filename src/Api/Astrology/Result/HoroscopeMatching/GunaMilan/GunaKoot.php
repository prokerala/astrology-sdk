<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

final class GunaKoot
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
     * @var string
     */
    private $girlKoot;

    /**
     * @var string
     */
    private $boyKoot;

    /**
     * @var float
     */
    private $maximumPoints;

    /**
     * @var float
     */
    private $obtainedPoints;

    /**
     * @var string
     */
    private $description;

    /**
     * GunaKoot constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $girlKoot
     * @param string $boyKoot
     * @param float  $maximumPoints
     * @param float  $obtainedPoints
     * @param string $description
     */
    public function __construct(
        $id,
        $name,
        $girlKoot,
        $boyKoot,
        $maximumPoints,
        $obtainedPoints,
        $description
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->girlKoot = $girlKoot;
        $this->boyKoot = $boyKoot;
        $this->maximumPoints = $maximumPoints;
        $this->obtainedPoints = $obtainedPoints;
        $this->description = $description;
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
     * @return string
     */
    public function getGirlKoot()
    {
        return $this->girlKoot;
    }

    /**
     * @return string
     */
    public function getBoyKoot()
    {
        return $this->boyKoot;
    }

    /**
     * @return float
     */
    public function getMaximumPoints()
    {
        return $this->maximumPoints;
    }

    /**
     * @return float
     */
    public function getObtainedPoints()
    {
        return $this->obtainedPoints;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
