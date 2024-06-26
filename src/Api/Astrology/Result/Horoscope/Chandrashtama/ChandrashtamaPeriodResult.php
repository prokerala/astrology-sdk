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

    private ChandrashtamaPeriod $chandrashtama;
    public function __construct(
        ChandrashtamaPeriod $chandrashtama,
    ) {
        $this->chandrashtama = $chandrashtama;
    }

    public function getChandrashtama(): ChandrashtamaPeriod
    {
        return $this->chandrashtama;
    }
}
