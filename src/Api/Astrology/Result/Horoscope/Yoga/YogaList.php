<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

class YogaList
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var Yoga[]
     */
    private $yogas;

    /**
     * YogaDetails constructor.
     * @param string $name
     * @param Yoga[] $yogas
     */
    public function __construct(
        $name,
        array $yogas
    )
    {
        $this->name = $name;
        $this->yogas = $yogas;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Yoga[]
     */
    public function getYogas()
    {
        return $this->yogas;
    }


}
