<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

final class Koot
{
    /**
     * Guna constructor.
     *
     * @param string $varna
     * @param string $vasya
     * @param string $tara
     * @param string $yoni
     * @param string $grahaMaitri
     * @param string $gana
     * @param string $bhakoot
     * @param string $nadi
     */
    public function __construct(private $varna, private $vasya, private $tara, private $yoni, private $grahaMaitri, private $gana, private $bhakoot, private $nadi)
    {
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
     * @return array<string,string>
     */
    public function getKoot()
    {
        return [
            'varna' => $this->varna,
            'vasya' => $this->vasya,
            'tara' => $this->tara,
            'yoni' => $this->yoni,
            'grahaMaitri' => $this->grahaMaitri,
            'gana' => $this->gana,
            'bhakoot' => $this->bhakoot,
            'nadi' => $this->nadi,
        ];
    }
}
