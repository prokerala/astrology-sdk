<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;

final class PlanetDoshaDetails
{
    private int $id;

    private string $name;

    private int $position;

    private bool $hasDosha;

    public function __construct(
        int $id,
        string $name,
        int $position,
        bool $hasDosha
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->hasDosha = $hasDosha;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function hasDosha(): bool
    {
        return $this->hasDosha;
    }
}
