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
    /**
     * @param AuspiciousYoga\Period[] $period
     */
    public function __construct(private int $id, private string $name, private array $period)
    {
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
