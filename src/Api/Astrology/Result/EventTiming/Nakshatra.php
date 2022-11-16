<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\EventTiming;

use Prokerala\Api\Astrology\Result\Element\Planet;

final class Nakshatra
{
    private int $id;

    private string $name;

    private Planet $lord;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    /**
     * Nakshatra constructor.
     */
    public function __construct(int $id, string $name, Planet $lord, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
        $this->start = $start;
        $this->end = $end;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLord(): Planet
    {
        return $this->lord;
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
