<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;


class Yoga
{

    /**
     * @var string
     */
    private $yogaName;
    /**
     * @var bool
     */
    private $hasYoga;
    /**
     * @var string
     */
    private $description;

    /**
     * Yoga constructor.
     * @param string $yogaName
     * @param bool $hasYoga
     * @param string $description
     */
    public function __construct(
        $yogaName,
        $hasYoga,
        $description
    )
    {

        $this->yogaName = $yogaName;
        $this->hasYoga = $hasYoga;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getYogaName()
    {
        return $this->yogaName;
    }

    /**
     * @return bool
     */
    public function isHasYoga()
    {
        return $this->hasYoga;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


}
