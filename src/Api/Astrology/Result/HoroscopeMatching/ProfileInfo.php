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

final class ProfileInfo
{
    private Koot $koot;

    private Nakshatra $nakshatra;

    private Rasi $rasi;

    /**
     * ProfileInfo constructor.
     */
    public function __construct(Koot $koot, Nakshatra $nakshatra, Rasi $rasi)
    {
        $this->koot = $koot;
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    public function getKoot(): Koot
    {
        return $this->koot;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }
}
