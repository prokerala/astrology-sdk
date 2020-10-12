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

use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Horoscope\Guna;

class ProfileInfo
{
    /**
     * @var Guna
     */
    private $guna;
    /**
     * @var Nakshatra
     */
    private $nakshatra;
    /**
     * @var Rasi
     */
    private $rasi;

    public function __construct(Guna $guna, Nakshatra $nakshatra, Rasi $rasi)
    {
        $this->guna = $guna;
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    /**
     * @return Guna
     */
    public function getGuna()
    {
        return $this->guna;
    }

    /**
     * @return Nakshatra
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return Rasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }
}
