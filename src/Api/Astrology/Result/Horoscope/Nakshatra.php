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

use Prokerala\Api\Astrology\Result\Horoscope\Nakshatra\NakshatraInfo;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

/**
 * Defines Nakshatra.
 */
class Nakshatra implements ResultInterface
{
    use RawResponseTrait;

    /** @var string */
    private $nakshatraName;
    /** @var float */
    private $nakshatraLongitude;
    /** @var \DateTimeInterface */
    private $nakshatraStart;
    /** @var \DateTimeInterface */
    private $nakshatraEnd;
    /** @var float */
    private $nakshatraPada;
    /** @var Rasi */
    private $chandraRasi;
    /** @var Rasi */
    private $sooryaRasi;
    /** @var Rasi */
    private $zodiac;
    /** @var Nakshatra\NakshatraInfo */
    private $additionalInfo;

    /**
     * @param string $nakshatraName
     * @param float  $nakshatraLongitude
     * @param float  $nakshatraPada
     */
    public function __construct(
        $nakshatraName,
        $nakshatraLongitude,
        \DateTimeInterface $nakshatraStart,
        \DateTimeInterface $nakshatraEnd,
        $nakshatraPada,
        Rasi $chandraRasi,
        Rasi $sooryaRasi,
        Rasi $zodiac,
        NakshatraInfo $additionalInfo
    ) {
        $this->nakshatraName = $nakshatraName;
        $this->nakshatraLongitude = $nakshatraLongitude;
        $this->nakshatraStart = $nakshatraStart;
        $this->nakshatraEnd = $nakshatraEnd;
        $this->nakshatraPada = $nakshatraPada;
        $this->chandraRasi = $chandraRasi;
        $this->sooryaRasi = $sooryaRasi;
        $this->zodiac = $zodiac;
        $this->additionalInfo = $additionalInfo;
    }

    /**
     * @return string
     */
    public function getNakshatraName()
    {
        return $this->nakshatraName;
    }

    /**
     * @return float
     */
    public function getNakshatraLongitude()
    {
        return $this->nakshatraLongitude;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getNakshatraStart()
    {
        return $this->nakshatraStart;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getNakshatraEnd()
    {
        return $this->nakshatraEnd;
    }

    /**
     * @return float
     */
    public function getNakshatraPada()
    {
        return $this->nakshatraPada;
    }

    /**
     * @return Rasi
     */
    public function getChandraRasi()
    {
        return $this->chandraRasi;
    }

    /**
     * @return Rasi
     */
    public function getSooryaRasi()
    {
        return $this->sooryaRasi;
    }

    /**
     * @return Rasi
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
