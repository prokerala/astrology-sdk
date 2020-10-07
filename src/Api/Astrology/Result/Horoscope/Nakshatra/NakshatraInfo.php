<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Nakshatra;

use Prokerala\Api\Astrology\Result\Rasi;

/**
 * Defines Nakshatra
 */
class NakshatraInfo
{
    /**
     * @var string
     */
    private $diety;
    /**
     * @var string
     */
    private $ganam;
    /**
     * @var string
     */
    private $symbol;
    /**
     * @var string
     */
    private $animalSign;
    /**
     * @var string
     */
    private $nadi;
    /**
     * @var string
     */
    private $color;
    /**
     * @var string
     */
    private $bestDirection;
    /**
     * @var string
     */
    private $syllables;
    /**
     * @var string
     */
    private $birthStone;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var string
     */
    private $planet;
    /**
     * @var string
     */
    private $enemyYoni;

    /**
     * NakshatraInfo constructor.
     * @param string $diety
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
    public function __construct(
        $diety,
        $ganam,
        $symbol,
        $animalSign,
        $nadi,
        $color,
        $bestDirection,
        $syllables,
        $birthStone,
        $gender,
        $planet,
        $enemyYoni
    )
    {

        $this->diety = $diety;
        $this->ganam = $ganam;
        $this->symbol = $symbol;
        $this->animalSign = $animalSign;
        $this->nadi = $nadi;
        $this->color = $color;
        $this->bestDirection = $bestDirection;
        $this->syllables = $syllables;
        $this->birthStone = $birthStone;
        $this->gender = $gender;
        $this->planet = $planet;
        $this->enemyYoni = $enemyYoni;
    }

    /**
     * @return string
     */
    public function getDiety()
    {
        return $this->diety;
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
