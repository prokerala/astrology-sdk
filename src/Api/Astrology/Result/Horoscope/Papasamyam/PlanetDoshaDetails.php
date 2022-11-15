<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;

final class PlanetDoshaDetails
{
    /**
     * @param int    $id
     * @param string $name
     * @param int    $position
     * @param bool   $hasDosha
     */
    public function __construct(private $id, private $name, private $position, private $hasDosha)
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
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function hasDosha()
    {
        return $this->hasDosha;
    }
}
