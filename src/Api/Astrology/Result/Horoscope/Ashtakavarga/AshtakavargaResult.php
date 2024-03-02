<?php
declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Horoscope\Ashtakavarga;

class AshtakavargaResult
{
    public function __construct(
        private AshtakavargaPlanetResult $prastara,
        private AshtakavargaRasiResult $trikona,
        private AshtakavargaRasiResult $ekaadhipatya,
    ) {
    }

    public function getPrastara(): AshtakavargaPlanetResult
    {
        return $this->prastara;
    }

    public function getTrikona(): AshtakavargaRasiResult
    {
        return $this->trikona;
    }

    public function getEkaadhipatya(): AshtakavargaRasiResult
    {
        return $this->ekaadhipatya;
    }
}
