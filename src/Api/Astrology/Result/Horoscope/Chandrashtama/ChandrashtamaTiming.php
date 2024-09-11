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

final class ChandrashtamaTiming
{
    private DateTimeInterface $start ;
    private DateTimeInterface $end;
    /** @var \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\NakshatraTiming[]  */
    private array $nakshatraTimings;

    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\NakshatraTiming[] $nakshatraTimings
     */
    public function __construct(
        DateTimeInterface $start,
        DateTimeInterface $end,
        array              $nakshatraTimings
    ) {
        $this->start = $start;
        $this->end = $end;
        $this->nakshatraTimings = $nakshatraTimings;
    }

    public function getStart(): DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): DateTimeInterface
    {
        return $this->end;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\NakshatraTiming[]
     */
    public function getNakshatraTimings(): array
    {
        return $this->nakshatraTimings;
    }
}
