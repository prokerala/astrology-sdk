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

use DateTimeInterface;
use Prokerala\Api\Astrology\Result\Element\NakshatraElement;

final class NakshatraTiming
{
    private NakshatraElement $nakshatra ;
    private DateTimeInterface $start ;
    private DateTimeInterface $end;
    private bool $isPeak;

    public function __construct(
        NakshatraElement   $nakshatra,
        DateTimeInterface $start,
        DateTimeInterface $end,
        bool               $isPeak,
    ) {
        $this->nakshatra = $nakshatra;
        $this->start = $start;
        $this->end = $end;
        $this->isPeak = $isPeak;
    }

    public function getNakshatra(): NakshatraElement
    {
        return $this->nakshatra;
    }

    public function getStart(): DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): DateTimeInterface
    {
        return $this->end;
    }

    public function isPeak(): bool
    {
        return $this->isPeak;
    }
}
