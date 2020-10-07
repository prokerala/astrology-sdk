<?php

namespace Prokerala\Api\Astrology\Result\Panchang;

use Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat;

class InauspiciousPeriod
{

    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $rahuKaal;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $yamagandaKaal;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $gulikaKaal;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    private $durMuhurat;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $varjyam;

    /**
     * AuspiciousPeriod constructor.
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $rahuKaal
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $yamagandaKaal
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $gulikaKaal
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[] $durMuhurat
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $varjyam
     */

    public function __construct(Muhurat $rahuKaal, Muhurat $yamagandaKaal, Muhurat $gulikaKaal, array $durMuhurat, Muhurat $varjyam)
    {

        $this->rahuKaal = $rahuKaal;
        $this->yamagandaKaal = $yamagandaKaal;
        $this->gulikaKaal = $gulikaKaal;
        $this->durMuhurat = $durMuhurat;
        $this->varjyam = $varjyam;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getRahuKaal()
    {
        return $this->rahuKaal;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getYamagandaKaal()
    {
        return $this->yamagandaKaal;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getGulikaKaal()
    {
        return $this->gulikaKaal;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    public function getDurMuhurat()
    {
        return $this->durMuhurat;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getVarjyam()
    {
        return $this->varjyam;
    }


}
