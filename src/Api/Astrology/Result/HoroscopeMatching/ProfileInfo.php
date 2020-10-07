<?php
namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\Nakshatra;
use Prokerala\Api\Astrology\Result\Rasi;

class ProfileInfo
{
    /**
     * @var string
     */
    private $varna;
    /**
     * @var string
     */
    private $vasya;
    /**
     * @var string
     */
    private $tara;
    /**
     * @var string
     */
    private $yoni;
    /**
     * @var string
     */
    private $grahaMaitri;
    /**
     * @var string
     */
    private $gana;
    /**
     * @var string
     */
    private $bhakoot;
    /**
     * @var string
     */
    private $nadi;
    /**
     * @var \Prokerala\Api\Astrology\Result\Nakshatra
     */
    private $nakshatra;
    /**
     * @var \Prokerala\Api\Astrology\Result\Rasi
     */
    private $rasi;

    /**
     * ProfileInfo constructor.
     * @param string $varna
     * @param string $vasya
     * @param string $tara
     * @param string $yoni
     * @param string $grahaMaitri
     * @param string $gana
     * @param string $bhakoot
     * @param string $nadi
     * @param \Prokerala\Api\Astrology\Result\Nakshatra $nakshatra
     * @param \Prokerala\Api\Astrology\Result\Rasi $rasi
     */
    public function __construct(
        $varna,
        $vasya,
        $tara,
        $yoni,
        $grahaMaitri,
        $gana,
        $bhakoot,
        $nadi,
        Nakshatra $nakshatra,
        Rasi $rasi
    ) {

        $this->varna = $varna;
        $this->vasya = $vasya;
        $this->tara = $tara;
        $this->yoni = $yoni;
        $this->grahaMaitri = $grahaMaitri;
        $this->gana = $gana;
        $this->bhakoot = $bhakoot;
        $this->nadi = $nadi;
        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    /**
     * @return string
     */
    public function getVarna()
    {
        return $this->varna;
    }

    /**
     * @return string
     */
    public function getVasya()
    {
        return $this->vasya;
    }

    /**
     * @return string
     */
    public function getTara()
    {
        return $this->tara;
    }

    /**
     * @return string
     */
    public function getYoni()
    {
        return $this->yoni;
    }

    /**
     * @return string
     */
    public function getGrahaMaitri()
    {
        return $this->grahaMaitri;
    }

    /**
     * @return string
     */
    public function getGana()
    {
        return $this->gana;
    }

    /**
     * @return string
     */
    public function getBhakoot()
    {
        return $this->bhakoot;
    }

    /**
     * @return string
     */
    public function getNadi()
    {
        return $this->nadi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Nakshatra
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Rasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }

}
