<?php
/**
 * (c) Ennexa Technologies <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  MIT License (https://api.prokerala.com/license.txt)
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology;

/**
 * Defines
 */
class Location
{
    /**
     * @var float $latitude
     */
    protected $latitude;
    /**
     * @var float $longitude
     */
    protected $longitude;
    /**
     * @var float $altitude
     */
    protected $altitude;
    /**
     * @var \DateTimeZone $timezone
     */
    protected $timezone;

    public function __construct($latitude, $longitude, $altitude = 0, \DateTimeZone $timezone = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        if (!$timezone) {
            $timezone = new \DateTimeZone(\date_default_timezone_get());
        }
        $this->timezone = $timezone;
    }

    /**
     * Get the location latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Get the location longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get the location timezone
     *
     * @return \DateTimeZone
     */
    public function getTimeZone()
    {
        return $this->timezone;
    }

    /**
     * Get the location altitude
     *
     * @return float
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * Get the location coordinates
     *
     * @return string
     */
    public function getCoordinates()
    {
        return "{$this->latitude},{$this->longitude}";
    }
}
