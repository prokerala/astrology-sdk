<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

final class ChandraBalaResult
{
    /**
     * @param \Prokerala\Api\Astrology\Result\Element\Rasi[] $rasis
     */
    public function __construct(private array $rasis, private \DateTimeInterface $start, private \DateTimeInterface $end)
    {
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Rasi[]
     */
    public function getRasis(): array
    {
        return $this->rasis;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }
}
