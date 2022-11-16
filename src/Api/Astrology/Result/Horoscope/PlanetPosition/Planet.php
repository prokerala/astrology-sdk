<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition;

use Prokerala\Api\Astrology\Result\Element\Rasi;

final class Planet
{
    private int $id;

    private string $name;

    private float $longitude;

    private bool $isRetrograde;

    private int $position;

    private float $degree;

    private Rasi $rasi;

    public function __construct(
        int $id,
        string $name,
        float $longitude,
        bool $isRetrograde,
        int $position,
        float $degree,
        Rasi $rasi
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->longitude = $longitude;
        $this->isRetrograde = $isRetrograde;
        $this->position = $position;
        $this->degree = $degree;
        $this->rasi = $rasi;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function isRetrograde(): bool
    {
        return $this->isRetrograde;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getDegree(): float
    {
        return $this->degree;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }
}
