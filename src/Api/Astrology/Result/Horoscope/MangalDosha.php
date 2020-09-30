<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;


class MangalDosha
{


    /**
     * @var bool
     */
    private $hasMangalDosha;
    /**
     * @var bool
     */
    private $hasException;
    /**
     * @var string
     */
    private $mangalDoshaType;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string[]
     */
    private $exceptions;
    /**
     * @var string[]
     */
    private $remedies;

    /**
     * MangalDosha constructor.
     * @param bool $hasMangalDosha
     * @param bool $hasException
     * @param string $mangalDoshaType
     * @param string $description
     * @param string[] $exceptions
     * @param string[] $remedies
     */

    public function __construct($hasMangalDosha, $hasException, $mangalDoshaType, $description, $exceptions, $remedies)
    {

        $this->hasMangalDosha = $hasMangalDosha;
        $this->hasException = $hasException;
        $this->mangalDoshaType = $mangalDoshaType;
        $this->description = $description;
        $this->exceptions = $exceptions;
        $this->remedies = $remedies;
    }

    /**
     * @return bool
     */
    public function hasMangalDosha()
    {
        return $this->hasMangalDosha;
    }

    /**
     * @return bool
     */
    public function hasException()
    {
        return $this->hasException;
    }

    /**
     * @return string
     */
    public function getMangalDoshaType()
    {
        return $this->mangalDoshaType;
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
    public function getExceptions()
    {
        return $this->exceptions;
    }

    /**
     * @return string[]
     */
    public function getRemedies()
    {
        return $this->remedies;
    }



}
