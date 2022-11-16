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

final class VimsottariDasha
{
    private int $id;

    private string $name;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    /**
     * @var Antardasha[]
     */
    private array $antardasha;

    /**
     * DashaPeriod constructor.
     *
     * @param Antardasha[] $antardasha
     */
    public function __construct(
        int $id,
        string $name,
        \DateTimeInterface $start,
        \DateTimeInterface $end,
        array $antardasha
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
        $this->antardasha = $antardasha;
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
     * @return Antardasha[]
     */
    public function getAntardasha(): array
    {
        return $this->antardasha;
    }
}
