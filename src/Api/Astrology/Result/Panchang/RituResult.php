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

final class RituResult
{
    private int $id;

    private string $name;

    private string $vedicName;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    public function __construct(int $id, string $name, string $vedicName, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->id = $id;
        $this->name = $name;
        $this->vedicName = $vedicName;
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

    public function getVedicName(): string
    {
        return $this->vedicName;
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
