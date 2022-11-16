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

final class BasicMatch
{
    use StringableTrait;

    private string $name;

    private bool $hasPorutham;

    private int $id;

    /**
     * Match constructor.
     */
    public function __construct(
        int $id,
        string $name,
        bool $hasPorutham
    ) {
        $this->name = $name;
        $this->hasPorutham = $hasPorutham;
        $this->id = $id;
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
}
