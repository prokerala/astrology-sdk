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
 * Defines Tithi
 */
class Tithi
{
    public const TITHI_PRATIPADA = 1;
    public const TITHI_DWITIYA = 2;
    public const TITHI_TRITIYA = 3;
    public const TITHI_CHATURTHI = 4;
    public const TITHI_PANCHAMI = 5;
    public const TITHI_SHASHTHI = 6;
    public const TITHI_SAPTAMI = 7;
    public const TITHI_ASHTAMI = 8;
    public const TITHI_NAVAMI = 9;
    public const TITHI_DASHAMI = 10;
    public const TITHI_EKADASHI = 11;
    public const TITHI_DWADASHI = 12;
    public const TITHI_TRAYODASHI = 13;
    public const TITHI_CHATURDASHI = 14;
    public const TITHI_PURNIMA = 15;
    public const TITHI_AMAVASYA = 16;

    private static $arTithi = [
        ['paksha' => 'Shukla', 'tithi' => 'Pratipada'],
        ['paksha' => 'Shukla', 'tithi' => 'Dwitiya'],
        ['paksha' => 'Shukla', 'tithi' => 'Tritiya'],
        ['paksha' => 'Shukla', 'tithi' => 'Chaturthi'],
        ['paksha' => 'Shukla', 'tithi' => 'Panchami'],
        ['paksha' => 'Shukla', 'tithi' => 'Shashthi'],
        ['paksha' => 'Shukla', 'tithi' => 'Saptami'],
        ['paksha' => 'Shukla', 'tithi' => 'Ashtami'],
        ['paksha' => 'Shukla', 'tithi' => 'Navami'],
        ['paksha' => 'Shukla', 'tithi' => 'Dashami'],
        ['paksha' => 'Shukla', 'tithi' => 'Ekadashi'],
        ['paksha' => 'Shukla', 'tithi' => 'Dwadashi'],
        ['paksha' => 'Shukla', 'tithi' => 'Trayodashi'],
        ['paksha' => 'Shukla', 'tithi' => 'Chaturdashi'],
        ['paksha' => 'Shukla', 'tithi' => 'Purnima'],
        ['paksha' => 'Krishna', 'tithi' => 'Pratipada'],
        ['paksha' => 'Krishna', 'tithi' => 'Dwitiya'],
        ['paksha' => 'Krishna', 'tithi' => 'Tritiya'],
        ['paksha' => 'Krishna', 'tithi' => 'Chaturthi'],
        ['paksha' => 'Krishna', 'tithi' => 'Panchami'],
        ['paksha' => 'Krishna', 'tithi' => 'Shashthi'],
        ['paksha' => 'Krishna', 'tithi' => 'Saptami'],
        ['paksha' => 'Krishna', 'tithi' => 'Ashtami'],
        ['paksha' => 'Krishna', 'tithi' => 'Navami'],
        ['paksha' => 'Krishna', 'tithi' => 'Dashami'],
        ['paksha' => 'Krishna', 'tithi' => 'Ekadashi'],
        ['paksha' => 'Krishna', 'tithi' => 'Dwadashi'],
        ['paksha' => 'Krishna', 'tithi' => 'Trayodashi'],
        ['paksha' => 'Krishna', 'tithi' => 'Chaturdashi'],
        ['paksha' => 'Krishna', 'tithi' => 'Amavasya'],
    ];

    protected $id;
    protected $start;
    protected $end;
    protected $paksha;

    public function __construct($id, \DateTimeImmutable $start, \DateTimeImmutable $end, $paksha)
    {
        $this->id = $id;
        $this->start = $start;
        $this->end = $end;
        $this->paksha = $paksha;
    }

    /**
     * Get tithi name
     *
     * @return string
     */
    public function getName()
    {
        return self::$arTithi[$this->id]['tithi'];
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get tithi start time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start;
    }

    /**
     * Get tithi end time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end;
    }

    /**
     * Get complete tithi list
     *
     * @return array
     */
    public function getTithiList()
    {
        return self::$arTithi;
    }

    /**
     * Get tithi paksha
     *
     * @return string
     */
    public function getPaksha()
    {
        return $this->paksha;
    }
}
