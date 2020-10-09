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

class Yoga
{
    /**
     * @var string
     */
    private $yogaName;
    /**
     * @var bool
     */
    private $hasYoga;
    /**
     * @var string
     */
    private $description;

    /**
     * Yoga constructor.
     *
     * @param string $yogaName
     * @param bool   $hasYoga
     * @param string $description
     */
    public function __construct(
        $yogaName,
        $hasYoga,
        $description
    ) {
        $this->yogaName = $yogaName;
        $this->hasYoga = $hasYoga;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getYogaName()
    {
        return $this->yogaName;
    }

    /**
     * @return bool
     */
    public function isHasYoga()
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
