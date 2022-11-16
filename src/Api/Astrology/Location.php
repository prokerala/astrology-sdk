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
    private float $latitude;

    private float $longitude;

    private float $altitude;

    private \DateTimeZone $timezone;

    public function __construct(float $latitude, float $longitude, float $altitude = 0, ?\DateTimeZone $timezone = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;
        if (!$timezone) {
            $timezone = new \DateTimeZone(date_default_timezone_get());
        }
        $this->timezone = $timezone;
    }

    /**
     * Get the location latitude.
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Get the location longitude.
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Get the location timezone.
     */
    public function getTimeZone(): \DateTimeZone
    {
        return $this->timezone;
    }

    /**
     * Get the location altitude.
     */
    public function getAltitude(): float
    {
        return $this->altitude;
    }

    /**
     * Get the location coordinates.
     */
    public function getCoordinates(): string
    {
        return "{$this->latitude},{$this->longitude}";
    }
}
