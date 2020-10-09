<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Chart;

use  Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet;

class ChartRasi
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    private $planetPosition;

    /**
     * ChartRasi constructor.
     * @param int $id
     * @param string $name
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct($id, $name, array $planetPosition)
    {

        $this->id = $id;
        $this->name = $name;
        $this->planetPosition = $planetPosition;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    public function getPlanetPosition()
    {
        return $this->planetPosition;
    }
}
