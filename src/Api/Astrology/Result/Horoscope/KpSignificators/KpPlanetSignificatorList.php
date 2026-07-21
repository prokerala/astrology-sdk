<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\KpSignificators;



use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Planet;

final class KpPlanetSignificatorList implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param \Prokerala\Api\Astrology\Result\Element\Bhava[] $rasiLordHouse
     * @param \Prokerala\Api\Astrology\Result\Element\Bhava[] $rasiLordOwnHouse
     */
    public function __construct(
        private Planet $planet,
        private Bhava $nakshatraLordHouse,
        private Bhava $occupiedHouse,
        private array $rasiLordHouse,
        private array $rasiLordOwnHouse,
    ) {
    }

    public function getPlanet(): Planet
    {
        return $this->planet;
    }

    public function getNakshatraLordHouse(): Bhava
    {
        return $this->nakshatraLordHouse;
    }

    public function getOccupiedHouse(): Bhava
    {
        return $this->occupiedHouse;
    }

    /**
     * @return Bhava[]
     */
    public function getRasiLordHouse(): array
    {
        return $this->rasiLordHouse;
    }

    /**
     * @return Bhava[]
     */
    public function getRasiLordOwnHouse(): array
    {
        return $this->rasiLordOwnHouse;
    }
}
