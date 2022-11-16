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
    private int $nakshatra;

    private int $nakshatra_pada;

    public function __construct(int $nakshatra, int $nakshatra_pada)
    {
        $this->nakshatra = $nakshatra;
        $this->nakshatra_pada = $nakshatra_pada;
    }

    /**
     * Function returns the nakshatra id.
     */
    public function getNakshatra(): int
    {
        return $this->nakshatra;
    }

    /**
     * Function returns the nakshatra pada.
     */
    public function getNakshatraPada(): int
    {
        return $this->nakshatra_pada;
    }
}
