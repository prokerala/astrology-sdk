<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Chart;


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
     * @var PlanetPosition[]
     */
    private $planetPosition;

    /**
     * ChartRasi constructor.
     * @param int $id
     * @param string $name
     * @param PlanetPosition[] $planetPosition
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
     * @return PlanetPosition[]
     */
    public function getPlanetPosition()
    {
        return $this->planetPosition;
    }
}
