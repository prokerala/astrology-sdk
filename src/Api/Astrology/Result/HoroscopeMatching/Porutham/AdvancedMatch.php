<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham;

use Prokerala\Api\Astrology\Traits\StringableTrait;

final class AdvancedMatch
{
    use StringableTrait;

    /**
     * Match constructor.
     *
     * @param int         $id
     * @param string      $name
     * @param bool        $hasPorutham
     * @param float       $points
     * @param string      $description
     */
    public function __construct(private $id, private $name, private $hasPorutham, private $points, private $description, private ?string $poruthamStatus = null)
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
     * @return bool
     */
    public function hasPorutham()
    {
        return $this->hasPorutham;
    }

    /**
     * @return null|string
     */
    public function getPoruthamStatus()
    {
        return $this->poruthamStatus;
    }

    /**
     * @return float
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
