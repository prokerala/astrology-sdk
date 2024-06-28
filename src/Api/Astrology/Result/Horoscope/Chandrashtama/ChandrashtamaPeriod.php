<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama;

use Prokerala\Api\Astrology\Result\Element\Nakshatra;
use Prokerala\Api\Astrology\Result\Element\Rasi;

final class ChandrashtamaPeriod
{

    private Rasi $rasi;
    private Nakshatra $nakshatra;

    /**
     * @var ChandrashtamaTiming[]
     */
    private array $timing;
    private bool $isActive;

    /**
     * @param ChandrashtamaTiming[] $timing
     */
    public function __construct(
        Rasi $rasi,
        Nakshatra $nakshatra,
        array $timing,
        bool $isActive
    ) {
        $this->rasi = $rasi;
        $this->nakshatra = $nakshatra;
        $this->timing = $timing;
        $this->isActive = $isActive;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }

    /**
     * @return ChandrashtamaTiming[]
     */
    public function getTiming(): array
    {
        return $this->timing;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }
}
