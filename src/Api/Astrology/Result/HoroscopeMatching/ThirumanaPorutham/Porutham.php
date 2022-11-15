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

final class Porutham
{
    /**
     * Porutham constructor.
     *
     * @param bool   $hasPorutham
     * @param int    $point
     * @param string $description
     */
    public function __construct(private $hasPorutham, private $point, private $description)
    {
    }

    /**
     * @return bool
     */
    public function hasPorutham()
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
