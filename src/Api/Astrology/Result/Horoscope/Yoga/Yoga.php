<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

final class Yoga
{
    /**
     * @param string $name
     * @param bool   $hasYoga
     * @param string $description
     */
    public function __construct(private $name, private $hasYoga, private $description)
    {
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
    public function hasYoga()
    {
        return $this->hasYoga;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
