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

    private Nakshatra $nakshatra;

    private Rasi $chandraRasi;

    private Rasi $sooryaRasi;

    private Zodiac $zodiac;

    private NakshatraInfo $additionalInfo;

    public function __construct(
        Nakshatra $nakshatra,
        Rasi $chandraRasi,
        Rasi $sooryaRasi,
        Zodiac $zodiac,
        NakshatraInfo $additionalInfo
    ) {
        $this->nakshatra = $nakshatra;
        $this->chandraRasi = $chandraRasi;
        $this->sooryaRasi = $sooryaRasi;
        $this->zodiac = $zodiac;
        $this->additionalInfo = $additionalInfo;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }

    public function getChandraRasi(): Rasi
    {
        return $this->chandraRasi;
    }

    public function getSooryaRasi(): Rasi
    {
        return $this->sooryaRasi;
    }

    public function getZodiac(): Zodiac
    {
        return $this->zodiac;
    }

    public function getAdditionalInfo(): NakshatraInfo
    {
        return $this->additionalInfo;
    }
}
