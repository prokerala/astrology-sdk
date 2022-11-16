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

final class AuspiciousYogaPeriod
{
    private int $id;

    private string $name;

    /**
     * @var AuspiciousYoga\Period[]
     */
    private array $period;

    /**
     * @param AuspiciousYoga\Period[] $period
     */
    public function __construct(int $id, string $name, array $period)
    {
        $this->id = $id;
        $this->name = $name;
        $this->period = $period;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AuspiciousYoga\Period[]
     */
    public function getPeriod(): array
    {
        return $this->period;
    }
}
