<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham;

use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;

final class Profile
{
    private Nakshatra $nakshatra;

    private Rasi $rasi;

    /**
     * Profile constructor.
     */
    public function __construct(Nakshatra $nakshatra, Rasi $rasi)
    {
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
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
