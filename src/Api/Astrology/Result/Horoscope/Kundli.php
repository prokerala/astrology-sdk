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
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Kundli implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BirthDetails
     */
    private $nakshatraDetails;
    /**
     * @var MangalDosha
     */
    private $mangalDosha;
    /**
     * @var Yoga\YogaDetails
     */
    private $yogas;

    /**
     * Kundli constructor.
     */
    public function __construct(BirthDetails $nakshatraDetails, MangalDosha $mangalDosha, YogaDetails $yogas)
    {
        $this->nakshatraDetails = $nakshatraDetails;
        $this->mangalDosha = $mangalDosha;
        $this->yogas = $yogas;
    }

    /**
     * @return BirthDetails
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
     * @return Yoga\YogaDetails
     */
    public function getYogas()
    {
        return $this->yogas;
    }
}
