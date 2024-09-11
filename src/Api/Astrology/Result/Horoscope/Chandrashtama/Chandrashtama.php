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

use Prokerala\Api\Astrology\Result\Element\Rasi;

final class Chandrashtama
{

    private Rasi $rasi;

    /** @var \Prokerala\Api\Astrology\Result\Element\NakshatraElement[]  */
    private array $nakshatra;

    /**
     * @param \Prokerala\Api\Astrology\Result\Element\Rasi        $rasi
     * @param \Prokerala\Api\Astrology\Result\Element\NakshatraElement[] $nakshatra
     */
    public function __construct(
        Rasi $rasi,
        array $nakshatra
    ) {
        $this->rasi = $rasi;
        $this->nakshatra = $nakshatra;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\NakshatraElement[]
     */
    public function getNakshatra(): array
    {
        return $this->nakshatra;
    }
}
