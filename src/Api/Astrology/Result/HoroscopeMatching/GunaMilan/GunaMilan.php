<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

class GunaMilan
{
    public $maximumPoint;

    public $totalPoint;

    public $varnaKoot;

    public $vasyaKoot;

    public $taraKoot;

    public $yoniKoot;

    public $grahaMaitriKoot;

    public $ganaKoot;

    public $bhakootKoot;

    public $nadiKoot;

    public $exceptions;

    /**
     * GunaMilan constructor.
     * @param float $totalPoint
     * @param float $maximumPoint
     * @param string[] $exceptions
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
        GunaKoot $nadiKoot,
        $exceptions
    ) {
        $this->maximumPoint = $maximumPoint;
        $this->totalPoint = $totalPoint;
        $this->varnaKoot = $varnaKoot;
        $this->vasyaKoot = $vasyaKoot;
        $this->taraKoot = $taraKoot;
        $this->yoniKoot = $yoniKoot;
        $this->grahaMaitriKoot = $grahaMaitriKoot;
        $this->ganaKoot = $ganaKoot;
        $this->bhakootKoot = $bhakootKoot;
        $this->nadiKoot = $nadiKoot;
        $this->exceptions = $exceptions;
    }

    public function getMaximumPoint () {
        return $this->maximumPoint;
    }

    public function getTotalPoint () {
        return $this->totalPoint;
    }

    public function getVarnaKoot() {
        return $this->varnaKoot;
    }

    public function getVasyaKoot() {
        return $this->vasyaKoot;
    }

    public function getTaraKoot() {
        return $this->taraKoot;
    }

    public function getYoniKoot() {
        return $this->yoniKoot;
    }

    public function getGrahaMaitriKoot() {
        return $this->grahaMaitriKoot;
    }

    public function getGanaKoot() {
        return $this->ganaKoot;
    }

    public function getBhakootKoot() {
        return $this->bhakootKoot;
    }

    public function getNadiKoot() {
        return $this->nadiKoot;
    }

    public function getExceptions() {
        return $this->exceptions;
    }
}
