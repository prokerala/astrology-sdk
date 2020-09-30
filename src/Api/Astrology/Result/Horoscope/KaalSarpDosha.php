<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;


class KaalSarpDosha
{


    /**
     * @var string
     */
    private $kaalSarpType;
    /**
     * @var string
     */
    private $kaalSarpDoshaType;
    /**
     * @var bool
     */
    private $hasKaalSarpDosha;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string[]
     */
    private $remedies;

    /**
     * KaalSarpDosha constructor.
     * @param string $kaalSarpType
     * @param string $kaalSarpDoshaType
     * @param bool $hasKaalSarpDosha
     * @param string $description
     * @param string[] $remedies
     */

    public function __construct($kaalSarpType, $kaalSarpDoshaType, $hasKaalSarpDosha, $description, $remedies)
    {

        $this->kaalSarpType = $kaalSarpType;
        $this->kaalSarpDoshaType = $kaalSarpDoshaType;
        $this->hasKaalSarpDosha = $hasKaalSarpDosha;
        $this->description = $description;
        $this->remedies = $remedies;
    }

    /**
     * @return string
     */
    public function getKaalSarpType()
    {
        return $this->kaalSarpType;
    }

    /**
     * @return string
     */
    public function getKaalSarpDoshaType()
    {
        return $this->kaalSarpDoshaType;
    }

    /**
     * @return bool
     */
    public function hasKaalSarpDosha()
    {
        return $this->hasKaalSarpDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string[]
     */
    public function getRemedies()
    {
        return $this->remedies;
    }

}
