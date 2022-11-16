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
    private string $varna;

    private string $vasya;

    private string $tara;

    private string $yoni;

    private string $grahaMaitri;

    private string $gana;

    private string $bhakoot;

    private string $nadi;

    /**
     * Guna constructor.
     */
    public function __construct(string $varna, string $vasya, string $tara, string $yoni, string $grahaMaitri, string $gana, string $bhakoot, string $nadi)
    {
        $this->varna = $varna;
        $this->vasya = $vasya;
        $this->tara = $tara;
        $this->yoni = $yoni;
        $this->grahaMaitri = $grahaMaitri;
        $this->gana = $gana;
        $this->bhakoot = $bhakoot;
        $this->nadi = $nadi;
    }

    public function getVarna(): string
    {
        return $this->varna;
    }

    public function getVasya(): string
    {
        return $this->vasya;
    }

    public function getTara(): string
    {
        return $this->tara;
    }

    public function getYoni(): string
    {
        return $this->yoni;
    }

    public function getGrahaMaitri(): string
    {
        return $this->grahaMaitri;
    }

    public function getGana(): string
    {
        return $this->gana;
    }

    public function getBhakoot(): string
    {
        return $this->bhakoot;
    }

    public function getNadi(): string
    {
        return $this->nadi;
    }

    /**
     * @return array<string,string>
     */
    public function getKoot(): array
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
