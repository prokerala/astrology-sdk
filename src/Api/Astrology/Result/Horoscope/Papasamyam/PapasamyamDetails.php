<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;


/**
 * Defines PlanetDoshaDetails
 */
class PapasamyamDetails
{
    /**
     * @var PapaPlanet[]
     */
    private $papaPlanet;

    /**
     * PapasamyamDetails constructor.
     * @param PapaPlanet[] $papaPlanet
     */
    public function __construct(array $papaPlanet)
    {

        $this->papaPlanet = $papaPlanet;
    }

    /**
     * @return PapaPlanet[]
     */
    public function getPapaPlanet()
    {
        return $this->papaPlanet;
    }
}
