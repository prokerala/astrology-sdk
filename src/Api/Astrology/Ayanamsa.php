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

/**
 * Defines Ayanamsa.
 */
class Ayanamsa
{
    public const LAHIRI = 1;
    public const RAMAN = 3;
    public const KP = 5;

    /**
     * Function returns the latitude.
     *
     * @return float
     */
    public function getAyanamsaList()
    {
        return [
            self::LAHIRI => 'Lahiri',
            self::RAMAN => 'Raman',
            self::KP => 'KP',
        ];
    }
}
