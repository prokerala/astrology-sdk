<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;


/**
 * Defines PapaPlanet
 */
class PapaPlanet
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var PlanetDoshaDetails[]
     */
    private $planetDosha;

    /**
     * PapaPlanet constructor.
     * @param string $name
     * @param PlanetDoshaDetails[] $planetDosha
     */
    public function __construct($name, array $planetDosha)
    {
        $this->name = $name;
        $this->planetDosha = $planetDosha;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return PlanetDoshaDetails[]
     */
    public function getPlanetDosha()
    {
        return $this->planetDosha;
    }


}
