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
    /**
     * Profile constructor.
     */
    public function __construct(private Nakshatra $nakshatra, private Rasi $rasi)
    {
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Nakshatra
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Rasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }
}
