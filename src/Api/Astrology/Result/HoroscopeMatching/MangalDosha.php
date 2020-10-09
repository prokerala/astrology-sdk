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

class MangalDosha
{
    /**
     * @var bool
     */
    private $hasMangalDosha;
    /**
     * @var bool
     */
    private $hasException;
    /**
     * @var string
     */
    private $mangalDoshaType;
    /**
     * @var string
     */
    private $description;

    /**
     * MangalDosha constructor.
     *
     * @param bool   $hasMangalDosha
     * @param bool   $hasException
     * @param string $mangalDoshaType
     * @param string $description
     */
    public function __construct($hasMangalDosha, $hasException, $mangalDoshaType, $description)
    {
        $this->hasMangalDosha = $hasMangalDosha;
        $this->hasException = $hasException;
        $this->mangalDoshaType = $mangalDoshaType;
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function getHasMangalDosha()
    {
        return $this->hasMangalDosha;
    }

    /**
     * @return bool
     */
    public function getHasException()
    {
        return $this->hasException;
    }

    /**
     * @return string
     */
    public function getMangalDoshaType()
    {
        return $this->mangalDoshaType;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
