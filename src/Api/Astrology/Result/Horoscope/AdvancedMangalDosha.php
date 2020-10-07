<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;


class AdvancedMangalDosha
{


    /**
     * @var bool
     */
    private $hasMangalDosha;
    /**
     * @var string
     */
    private $description;
    /**
     * @var bool
     */
    private $hasException;
    /**
     * @var string
     */
    private $mangalDoshaType;
    /**
     * @var string[]
     */
    private $exceptions;
    /**
     * @var string[]
     */
    private $remedies;

    /**
     * AdvancedMangalDosha constructor.
     * @param bool $hasMangalDosha
     * @param string $description
     * @param bool $hasException
     * @param string $mangalDoshaType
     * @param string[] $exceptions
     * @param string[] $remedies
     */
    public function __construct(
        $hasMangalDosha,
        $description,
        $hasException,
        $mangalDoshaType,
        array $exceptions,
        array $remedies
    )
    {

        $this->hasMangalDosha = $hasMangalDosha;
        $this->description = $description;
        $this->hasException = $hasException;
        $this->mangalDoshaType = $mangalDoshaType;
        $this->exceptions = $exceptions;
        $this->remedies = $remedies;
    }

    /**
     * @return bool
     */
    public function getHasMangalDosha()
    {
        return $this->hasMangalDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function getHasException()
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
