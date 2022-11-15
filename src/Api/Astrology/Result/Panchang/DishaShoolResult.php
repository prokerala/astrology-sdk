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

final class DishaShoolResult
{
    public function __construct(private string $direction, private string $remedy, private \DateTimeInterface $start, private \DateTimeInterface $end)
    {
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getRemedy(): string
    {
        return $this->remedy;
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
