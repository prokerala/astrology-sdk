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

use Prokerala\Api\Astrology\Result\Event\Nakshatra;
use Prokerala\Api\Astrology\Result\Event\ChandraRasi;
use Prokerala\Api\Astrology\Result\Horoscope\Guna;

class ProfileInfo
{

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Guna
     */
    private $guna;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\Nakshatra
     */
    private $nakshatra;
    /**
     * @var \Prokerala\Api\Astrology\Result\Event\ChandraRasi
     */
    private $rasi;

    /**
     * ProfileInfo constructor.
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Guna $guna
     * @param \Prokerala\Api\Astrology\Result\Event\Nakshatra $nakshatra
     * @param \Prokerala\Api\Astrology\Result\Event\ChandraRasi $rasi
     */
    public function __construct(
        Guna $guna,
        Nakshatra $nakshatra,
        ChandraRasi $rasi
    ) {

        $this->guna = $guna;
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Guna
     */
    public function getGuna()
    {
        return $this->guna;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\Nakshatra
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Event\ChandraRasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }

}
