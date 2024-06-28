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

final class ChandrashtamaTiming
{
    private \DateTimeInterface $start ;
    private \DateTimeInterface $end;

    public function __construct(
        \DateTimeInterface $start,
        \DateTimeInterface $end,
    ) {
        $this->start = $start;
        $this->end = $end;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }
}
