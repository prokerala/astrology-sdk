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

final class Karana
{
    private int $index;

    private int $id;

    private string $name;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    public function __construct(int $index, int $id, string $name, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->index = $index;
        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
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
