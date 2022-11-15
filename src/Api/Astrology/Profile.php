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

final class Profile
{
    public function __construct(private Location $location, private \DateTimeInterface $datetime)
    {
    }

    /**
     * Get birth time.
     *
     * @return \DateTimeInterface
     */
    public function getDateTime()
    {
        return $this->datetime;
    }

    /**
     * Get birth location.
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}
