<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology;

final class NakshatraProfile
{
    public function __construct(private int $nakshatra, private int $nakshatra_pada)
    {
    }

    /**
     * Function returns the nakshatra id.
     *
     * @return int
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * Function returns the nakshatra pada.
     *
     * @return int
     */
    public function getNakshatraPada()
    {
        return $this->nakshatra_pada;
    }
}
