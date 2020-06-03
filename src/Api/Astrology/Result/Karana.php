<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology\Result;

/**
 * Defines Karana
 */
class Karana extends Karna
{
    public const KARANA_BAVA = 0;
    public const KARANA_BALAVA = 1;
    public const KARANA_KAULAVA = 2;
    public const KARANA_TAITILA = 3;
    public const KARANA_GARIJA = 4;
    public const KARANA_VANIJA = 5;
    public const KARANA_VISHTI = 6;
    public const KARANA_KIMSTUGHNA = 7;
    public const KARANA_SHAKUNI = 8;
    public const KARANA_CHATUSHPADA = 9;
    public const KARANA_NAGA = 10;

    private static $arKarana = [
        'Bava', 'Balava', 'Kaulava', 'Taitila',
        'Garija', 'Vanija', 'Vishti', 'Shakuni',
        'Chatushpada', 'Naga', 'Kimstughna'
    ];

    /**
     * @var int $id
     */
    protected $id;
    /**
     * @var \DateTimeImmutable $start
     */
    protected $start;
    /**
     * @var \DateTimeImmutable $end
     */
    protected $end;

    public function __construct($id, \DateTimeImmutable $start, \DateTimeImmutable $end)
    {
        $this->id = $id;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Get karana name
     *
     * @return string
     */
    public function getName()
    {
        return self::$arKarana[$this->id];
    }

    /**
     * Get karana id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get karana start time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Get karana end time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Get a list of all Karanas
     *
     * @return array
     */
    public function getKaranaList()
    {
        return self::$arKarana;
    }
}
