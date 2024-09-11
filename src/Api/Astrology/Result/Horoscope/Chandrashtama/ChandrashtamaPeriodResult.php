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

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class ChandrashtamaPeriodResult implements ResultInterface
{
    use RawResponseTrait;

    private Chandrashtama $chandrashtama;

    /** @var \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\ChandrashtamaTiming[]  */
    private array $chandrashtamaTiming;

    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\ChandrashtamaTiming[] $chandrashtamaTiming
     */
    public function __construct(
        Chandrashtama $chandrashtama,
        array         $chandrashtamaTiming,
    ) {
        $this->chandrashtama = $chandrashtama;
        $this->chandrashtamaTiming = $chandrashtamaTiming;
    }

    public function getChandrashtama(): Chandrashtama
    {
        return $this->chandrashtama;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\ChandrashtamaTiming[]
     */
    public function getChandrashtamaTiming(): array
    {
        return $this->chandrashtamaTiming;
    }
}
