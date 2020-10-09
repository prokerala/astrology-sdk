<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology;

/**
 * Defines Profile.
 */
class Profile
{
    /**
     * Init Profile.
     *
     * @param array $data nakshatra details
     */
    public $location;
    public $datetime;

    public function __construct(Location $location, \DateTimeInterface $datetime)
    {
        $this->location = $location;
        $this->datetime = $datetime;
    }

    /**
     * Function returns the datetime.
     *
     * @return object
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * Function returns the location.
     *
     * @return object
     */
    public function getLocation()
    {
        return $this->location;
    }
}
