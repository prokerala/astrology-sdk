<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\KpSignificators;



use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Planet;

final class KpHouse implements ResultInterface
{
    use RawResponseTrait;


    public function __construct(
        private  Bhava $house,
        private  KpHouseCusp $startCusp,
        private  KpHouseCusp $endCusp,
        private  Rasi $rasi,
        private  Nakshatra $nakshatra,
        private  Planet $nakshatra_lord,
        private  Planet $subLord,
        private  Planet $subSubLord,
    ) {
    }

    public function getHouse(): Bhava
    {
        return $this->house;
    }

    public function getNakshatraLordHouse(): KPHouseCusp
    {
        return $this->startCusp;
    }

    public function getEndCusp(): KPHouseCusp
    {
        return $this->endCusp;
    }


    public function getRasi(): Rasi
    {
        return $this->rasi;
    }


    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }


    public function getStarLord(): Planet
    {
        return $this->nakshatra_lord;
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
