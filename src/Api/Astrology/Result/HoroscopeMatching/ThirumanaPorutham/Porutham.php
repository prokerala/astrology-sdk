<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham;

class Porutham
{
    /**
     * @var bool
     */
    private $hasPorutham;
    /**
     * @var int
     */
    private $point;
    /**
     * @var string
     */
    private $description;

    /**
     * Porutham constructor.
     *
     * @param bool   $hasPorutham
     * @param int    $point
     * @param string $description
     */
    public function __construct($hasPorutham, $point, $description)
    {
        $this->hasPorutham = $hasPorutham;
        $this->point = $point;
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function getHasPorutham()
    {
        return $this->hasPorutham;
    }

    /**
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
