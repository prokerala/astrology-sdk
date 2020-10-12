<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class KaalSarpDosha implements ResultInterface
{
    use RawResponseTrait;

    /** @var null|string */
    private $kaalSarpType;
    /** @var null|string */
    private $kaalSarpDoshaType;
    /** @var bool */
    private $hasKaalSarpDosha;
    /** @var string */
    private $description;

    /**
     * @param null|string $kaalSarpType
     * @param null|string $kaalSarpDoshaType
     * @param bool        $hasKaalSarpDosha
     * @param string      $description
     */
    public function __construct($kaalSarpType, $kaalSarpDoshaType, $hasKaalSarpDosha, $description)
    {
        $this->kaalSarpType = $kaalSarpType;
        $this->kaalSarpDoshaType = $kaalSarpDoshaType;
        $this->hasKaalSarpDosha = $hasKaalSarpDosha;
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getKaalSarpType()
    {
        return $this->kaalSarpType;
    }

    /**
     * @return null|string
     */
    public function getKaalSarpDoshaType()
    {
        return $this->kaalSarpDoshaType;
    }

    /**
     * @return bool
     */
    public function hasKaalSarpDosha()
    {
        return $this->hasKaalSarpDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
