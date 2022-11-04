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
    /** @var int */
    private $ayanamsa = 1;

    /**
     * Set ayanamsa system.
     *
     * @param int $ayanamsa
     *
     * @return void
     */
    public function setAyanamsa($ayanamsa)
    {
        $this->ayanamsa = $ayanamsa;
    }

    /**
     * Get configured ayanamsa system.
     *
     * @return int
     */
    public function getAyanamsa()
    {
        return $this->ayanamsa;
    }
}
