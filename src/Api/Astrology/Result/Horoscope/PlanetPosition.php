<?php
namespace Prokerala\Api\Astrology\Result\Horoscope;

/**
 * Defines Planet Position
 */
class PlanetPosition
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    private $planetPosition;

    /**
     * PlanetPosition constructor.
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct(array $planetPosition)
    {

        $this->planetPosition = $planetPosition;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    public function getPlanetPosition()
    {
        return $this->planetPosition;
    }
}
