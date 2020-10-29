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
use Prokerala\Api\Astrology\Result\Horoscope\Koot;

class ProfileInfo
{
    /**
     * @var Koot
     */
    private $koot;
    /**
     * @var Nakshatra
     */
    private $nakshatra;
    /**
     * @var Rasi
     */
    private $rasi;

    /**
     * ProfileInfo constructor.
     */
    public function __construct(Koot $koot, Nakshatra $nakshatra, Rasi $rasi)
    {
        $this->koot = $koot;
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    /**
     * @return Koot
     */
    public function getKoot()
    {
        return $this->koot;
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
