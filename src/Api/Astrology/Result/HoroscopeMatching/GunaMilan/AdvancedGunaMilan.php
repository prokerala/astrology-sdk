<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class AdvancedGunaMilan
{

    /**
     * @var float
     */
    private $totalPoint;
    /**
     * @var int
     */
    private $maximumPoint;
    /**
     * @var GunaKoot
     */
    private $varnaKoot;
    /**
     * @var GunaKoot
     */
    private $vasyaKoot;
    /**
     * @var GunaKoot
     */
    private $taraKoot;
    /**
     * @var GunaKoot
     */
    private $yoniKoot;
    /**
     * @var GunaKoot
     */
    private $grahaMaitriKoot;
    /**
     * @var GunaKoot
     */
    private $ganaKoot;
    /**
     * @var GunaKoot
     */
    private $bhakootKoot;
    /**
     * @var GunaKoot
     */
    private $nadiKoot;

    /**
     * GunaMilan constructor.
     * @param float $totalPoint
     * @param int $maximumPoint
     * @param GunaKoot $varnaKoot
     * @param GunaKoot $vasyaKoot
     * @param GunaKoot $taraKoot
     * @param GunaKoot $yoniKoot
     * @param GunaKoot $grahaMaitriKoot
     * @param GunaKoot $ganaKoot
     * @param GunaKoot $bhakootKoot
     * @param GunaKoot $nadiKoot
     */
    public function __construct(
        $totalPoint,
        $maximumPoint,
        GunaKoot $varnaKoot,
        GunaKoot $vasyaKoot,
        GunaKoot $taraKoot,
        GunaKoot $yoniKoot,
        GunaKoot $grahaMaitriKoot,
        GunaKoot $ganaKoot,
        GunaKoot $bhakootKoot,
        GunaKoot $nadiKoot
    ) {
        $this->totalPoint = $totalPoint;
        $this->maximumPoint = $maximumPoint;
        $this->varnaKoot = $varnaKoot;
        $this->vasyaKoot = $vasyaKoot;
        $this->taraKoot = $taraKoot;
        $this->yoniKoot = $yoniKoot;
        $this->grahaMaitriKoot = $grahaMaitriKoot;
        $this->ganaKoot = $ganaKoot;
        $this->bhakootKoot = $bhakootKoot;
        $this->nadiKoot = $nadiKoot;
    }

    /**
     * @return float
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @return int
     */
    public function getMaximumPoint()
    {
        return $this->maximumPoint;
    }

    /**
     * @return GunaKoot
     */
    public function getVarnaKoot()
    {
        return $this->varnaKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getVasyaKoot()
    {
        return $this->vasyaKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getTaraKoot()
    {
        return $this->taraKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getYoniKoot()
    {
        return $this->yoniKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getGrahaMaitriKoot()
    {
        return $this->grahaMaitriKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getGanaKoot()
    {
        return $this->ganaKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getBhakootKoot()
    {
        return $this->bhakootKoot;
    }

    /**
     * @return GunaKoot
     */
    public function getNadiKoot()
    {
        return $this->nadiKoot;
    }

}
