<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\KpSignificators;



use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Planet;

final class KpPlanetPosition implements ResultInterface
{
    use RawResponseTrait;


    public function __construct(
        private  Planet $planet,
        private  Nakshatra $nakshatra,
        private  Bhava $house,
        private  Rasi $rasi,
        private  float $signDegree,
        private  float $longitude,
        private  Planet $nakshatraLord,
        private  Planet $subLord,
        private  Planet $subSubLord,
    ) {
    }

    public function getPlanet(): Planet
    {
        return $this->planet;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }

    public function getHouse(): Bhava
    {
        return $this->house;
    }

    /**
     * @return Rasi<System::Sidereal>
     */
    public function getRasi(): Rasi
    {
        return $this->rasi;
    }

    public function getSignDegree(): float
    {
        return $this->signDegree;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getStartLord(): Planet
    {
        return $this->nakshatraLord;
    }

    public function getSubLord(): Planet
    {
        return $this->subLord;
    }

    public function getSubSubLord(): Planet
    {
        return $this->subSubLord;
    }
}
