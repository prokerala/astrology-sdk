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

class KaalSarpDosha
{

    /**
     * @var string|null
     */
    private $kaalSarpType;
    /**
     * @var string|null
     */
    private $kaalSarpDoshaType;
    /**
     * @var bool
     */
    private $hasKaalSarpDosha;
    /**
     * @var string
     */
    private $description;

    /**
     * KaalSarpDosha constructor.
     * @param string|null $kaalSarpType
     * @param string|null $kaalSarpDoshaType
     * @param bool $hasKaalSarpDosha
     * @param string $description
     */
    public function __construct($kaalSarpType, $kaalSarpDoshaType, $hasKaalSarpDosha, $description)
    {

        $this->kaalSarpType = $kaalSarpType;
        $this->kaalSarpDoshaType = $kaalSarpDoshaType;
        $this->hasKaalSarpDosha = $hasKaalSarpDosha;
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getKaalSarpType()
    {
        return $this->kaalSarpType;
    }

    /**
     * @return string|null
     */
    public function getKaalSarpDoshaType()
    {
        return $this->kaalSarpDoshaType;
    }

    /**
     * @return bool
     */
    public function getHasKaalSarpDosha()
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
