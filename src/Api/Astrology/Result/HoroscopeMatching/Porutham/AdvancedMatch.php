<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham;

use Prokerala\Api\Astrology\Traits\StringableTrait;

final class AdvancedMatch
{
    use StringableTrait;

    private string $name;

    private bool $hasPorutham;

    private ?string $poruthamStatus;

    private float $points;

    private string $description;

    private int $id;

    /**
     * Match constructor.
     */
    public function __construct(
        int $id,
        string $name,
        bool $hasPorutham,
        float $points,
        string $description,
        ?string $poruthamStatus = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->hasPorutham = $hasPorutham;
        $this->poruthamStatus = $poruthamStatus;
        $this->points = $points;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasPorutham(): bool
    {
        return $this->hasPorutham;
    }

    public function getPoruthamStatus(): ?string
    {
        return $this->poruthamStatus;
    }

    public function getPoints(): float
    {
        return $this->points;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
