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

use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Zodiac;
use Prokerala\Api\Astrology\Result\Horoscope\Nakshatra\NakshatraInfo;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class BirthDetails implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private Nakshatra $nakshatra, private Rasi $chandraRasi, private Rasi $sooryaRasi, private Zodiac $zodiac, private NakshatraInfo $additionalInfo)
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
    public function getChandraRasi()
    {
        return $this->chandraRasi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Rasi
     */
    public function getSooryaRasi()
    {
        return $this->sooryaRasi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Zodiac
     */
    public function getZodiac()
    {
        return $this->zodiac;
    }

    /**
     * @return NakshatraInfo
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }
}
