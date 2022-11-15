<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Nakshatra;

final class NakshatraInfo
{
    /**
     * @param string $deity
     * @param string $ganam
     * @param string $symbol
     * @param string $animalSign
     * @param string $nadi
     * @param string $color
     * @param string $bestDirection
     * @param string $syllables
     * @param string $birthStone
     * @param string $gender
     * @param string $planet
     * @param string $enemyYoni
     */
    public function __construct(private $deity, private $ganam, private $symbol, private $animalSign, private $nadi, private $color, private $bestDirection, private $syllables, private $birthStone, private $gender, private $planet, private $enemyYoni)
    {
    }

    /**
     * @return string
     */
    public function getDeity()
    {
        return $this->deity;
    }

    /**
     * @return string
     */
    public function getGanam()
    {
        return $this->ganam;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @return string
     */
    public function getAnimalSign()
    {
        return $this->animalSign;
    }

    /**
     * @return string
     */
    public function getNadi()
    {
        return $this->nadi;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getBestDirection()
    {
        return $this->bestDirection;
    }

    /**
     * @return string
     */
    public function getSyllables()
    {
        return $this->syllables;
    }

    /**
     * @return string
     */
    public function getBirthStone()
    {
        return $this->birthStone;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getPlanet()
    {
        return $this->planet;
    }

    /**
     * @return string
     */
    public function getEnemyYoni()
    {
        return $this->enemyYoni;
    }
}
