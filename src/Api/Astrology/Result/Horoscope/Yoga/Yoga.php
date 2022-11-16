<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

final class Yoga
{
    private string $name;

    private bool $hasYoga;

    private string $description;

    public function __construct(
        string $name,
        bool $hasYoga,
        string $description
    ) {
        $this->name = $name;
        $this->hasYoga = $hasYoga;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasYoga(): bool
    {
        return $this->hasYoga;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
