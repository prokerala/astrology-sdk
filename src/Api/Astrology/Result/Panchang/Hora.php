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

use Prokerala\Api\Astrology\Result\Element\Planet;

final class Hora
{
    private Planet $hora;

    private string $type;

    private bool $isDay;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    public function __construct(Planet $hora, string $type, bool $isDay, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->hora = $hora;
        $this->type = $type;
        $this->isDay = $isDay;
        $this->start = $start;
        $this->end = $end;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function getHora(): Planet
    {
        return $this->hora;
    }

    public function isDay(): bool
    {
        return $this->isDay;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
