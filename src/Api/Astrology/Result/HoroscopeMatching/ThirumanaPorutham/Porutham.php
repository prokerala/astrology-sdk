<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\ThirumanaPorutham;

final class Porutham
{
    private bool $hasPorutham;

    private int $point;

    private string $description;

    /**
     * Porutham constructor.
     */
    public function __construct(bool $hasPorutham, int $point, string $description)
    {
        $this->hasPorutham = $hasPorutham;
        $this->point = $point;
        $this->description = $description;
    }

    public function hasPorutham(): bool
    {
        return $this->hasPorutham;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
