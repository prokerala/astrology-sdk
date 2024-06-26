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

final class Chandrashtama
{

    private Rasi $rasi;
    private Nakshatra $nakshatra;

    /**
     * @param Rasi                  $rasi
     * @param Nakshatra             $nakshatra
     */
    public function __construct(
        Rasi $rasi,
        Nakshatra $nakshatra,
    ) {
        $this->rasi = $rasi;
        $this->nakshatra = $nakshatra;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }
}
