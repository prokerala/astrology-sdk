<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Traits\Service;

/**
 * @internal
 */
trait AyanamsaAwareTrait
{
    private int $ayanamsa = 1;

    /**
     * Set ayanamsa system.
     * @param int $ayanamsa
     */
    public function setAyanamsa($ayanamsa): void
    {
        $this->ayanamsa = (int)$ayanamsa;
    }

    /**
     * Get configured ayanamsa system.
     */
    public function getAyanamsa(): int
    {
        return $this->ayanamsa;
    }
}
