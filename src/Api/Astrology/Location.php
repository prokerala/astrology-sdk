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

final class Location
{
    /**
     * @var \DateTimeZone
     */
    private $timezone;

    public function __construct(private float $latitude, private float $longitude, private float $altitude = 0, ?\DateTimeZone $timezone = null)
    {
        if (!$timezone) {
            $timezone = new \DateTimeZone(date_default_timezone_get());
        }
        $this->timezone = $timezone;
    }

    /**
     * Get the location latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Get the location longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get the location timezone.
     *
     * @return \DateTimeZone
     */
    public function getTimeZone()
    {
        return $this->timezone;
    }

    /**
     * Get the location altitude.
     *
     * @return float
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * Get the location coordinates.
     *
     * @return string
     */
    public function getCoordinates()
    {
        return "{$this->latitude},{$this->longitude}";
    }
}
