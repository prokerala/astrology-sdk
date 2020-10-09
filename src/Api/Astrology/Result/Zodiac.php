<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result;

/**
 * Defines Zodiac.
 */
class Zodiac
{
    public const RASI_MESHA = 0;
    public const RASI_VRISHABHA = 1;
    public const RASI_MITHUNA = 2;
    public const RASI_KARKA = 3;
    public const RASI_SIMHA = 4;
    public const RASI_KANYA = 5;
    public const RASI_TULA = 6;
    public const RASI_VRISCHIKA = 7;
    public const RASI_DHANU = 8;
    public const RASI_MAKARA = 9;
    public const RASI_KUMBHA = 10;
    public const RASI_MEENA = 11;

    protected $id;
    protected $longitude;
    protected $lord;
    protected $start;
    protected $end;

    private static $arZodiac = [
        'Mesha',
        'Vrishabha',
        'Mithuna',
        'Karka',
        'Simha',
        'Kanya',
        'Tula',
        'Vrischika',
        'Dhanu',
        'Makara',
        'Kumbha',
        'Meena',
    ];

    public function __construct($id, $longitude = null, $lord = null, ?\DateTimeImmutable $start = null, ?\DateTimeImmutable $end = null)
    {
        $this->id = $id;
        $this->longitude = $longitude;
        $this->lord = $lord;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Get sign name.
     *
     * @return string
     */
    public function getName()
    {
        return self::$arZodiac[$this->id];
    }

    /**
     * Get sign id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get Rasi lord.
     *
     * @return string
     */
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * Get zodiac sign start time.
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Get zodiac sign end time.
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Get full zodiac sign list.
     *
     * @return array
     */
    public function getZodiacList()
    {
        return self::$arZodiac;
    }
}
