<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\KpSignificators;



use Prokerala\Api\Astrology\NakshatraProfile;
use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\Element\Planet;

final class KpHouseCusp implements ResultInterface
{
    use RawResponseTrait;


    public function __construct(
        private  float $longitude,
        private  float $degree,
        private  Rasi $rasi,
    ) {
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getDegree(): float
    {
        return $this->degree;
    }

    public function getZodiac(): Rasi
    {
        return $this->rasi;
    }
}
