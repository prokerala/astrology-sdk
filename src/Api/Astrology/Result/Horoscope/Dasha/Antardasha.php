<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;

final class Antardasha
{
    private int $id;

    private string $name;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    /**
     * @var Pratyantardasha[]
     */
    private array $pratyantardasha;

    /**
     * @param Pratyantardasha[] $pratyantardasha
     */
    public function __construct(
        int $id,
        string $name,
        \DateTimeInterface $start,
        \DateTimeInterface $end,
        array $pratyantardasha
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
        $this->pratyantardasha = $pratyantardasha;
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

    /**
     * @return Pratyantardasha[]
     */
    public function getPratyantardasha(): array
    {
        return $this->pratyantardasha;
    }
}
