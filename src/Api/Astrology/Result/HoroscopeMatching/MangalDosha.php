<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

final class MangalDosha
{
    /**
     * MangalDosha constructor.
     *
     * @param bool        $hasDosha
     * @param bool        $hasException
     * @param string      $description
     */
    public function __construct(private $hasDosha, private $hasException, private ?string $doshaType, private $description)
    {
    }

    /**
     * @return bool
     */
    public function hasDosha()
    {
        return $this->hasDosha;
    }

    /**
     * @return bool
     */
    public function hasException()
    {
        return $this->hasException;
    }

    /**
     * @return null|string
     */
    public function getDoshaType()
    {
        return $this->doshaType;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
