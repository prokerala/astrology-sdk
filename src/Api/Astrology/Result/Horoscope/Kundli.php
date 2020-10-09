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

use Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails;

class Kundli
{
    /**
     * @var Nakshatra
     */
    private $nakshatraDetails;
    /**
     * @var MangalDosha
     */
    private $mangalDosha;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails
     */
    private $yogas;

    /**
     * Kundli constructor.
     */
    public function __construct(Nakshatra $nakshatraDetails, MangalDosha $mangalDosha, YogaDetails $yogas)
    {
        $this->nakshatraDetails = $nakshatraDetails;
        $this->mangalDosha = $mangalDosha;
        $this->yogas = $yogas;
    }

    /**
     * @return Nakshatra
     */
    public function getNakshatraDetails()
    {
        return $this->nakshatraDetails;
    }

    /**
     * @return MangalDosha
     */
    public function getMangalDosha()
    {
        return $this->mangalDosha;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails
     */
    public function getYogas()
    {
        return $this->yogas;
    }
}
