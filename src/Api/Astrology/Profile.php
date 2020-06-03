<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology;

/**
 * Defines Profile
 */
class Profile
{
    /**
     * Init Profile
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
     * Function returns the datetime
     *
     * @return object
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * Function returns the location
     *
     * @return object
     */
    public function getLocation()
    {
        return $this->location;
    }
}
