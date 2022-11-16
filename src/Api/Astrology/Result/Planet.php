<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result;

final class Planet
{
    public const SUN = 0;
    public const MOON = 1;
    public const MERCURY = 2;
    public const VENUS = 3;
    public const MARS = 4;
    public const JUPITER = 5;
    public const SATURN = 6;
    public const RAHU = 101;
    public const KETU = 102;
    public const ASCENDANT = 100;

    public const PLANET_LIST = [
        0 => 'Sun', 1 => 'Moon', 2 => 'Mercury', 3 => 'Venus', 4 => 'Mars',
        5 => 'Jupiter', 6 => 'Saturn', 101 => 'Rahu', 102 => 'Ketu', 100 => 'Ascendant',
    ];

    private int $id;

    private string $name;

    private float $longitude;

    private bool $isReverse;

    private int $position;

    private string $degree;

    private int $rasi;

    private string $rasiLord;

    public function __construct(int $id, string $name, float $longitude, bool $is_reverse, int $position, string $degree, int $rasi, string $rasi_lord)
    {
        $this->id = $id;
        $this->name = $name;
        $this->longitude = $longitude;
        $this->isReverse = $is_reverse;
        $this->position = $position;
        $this->degree = $degree;
        $this->rasi = $rasi;
        $this->rasiLord = $rasi_lord;
    }

    /**
     * Get planet name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get planet id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get planet longitude.
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Check whether the planet is in retrograde motion.
     */
    public function isRetrograde(): bool
    {
        return $this->isReverse;
    }

    /**
     * Get planet position.
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * Get longitude degree.
     */
    public function getDegree(): string
    {
        return $this->degree;
    }

    /**
     * Get planet rasi.
     */
    public function getRasi(): int
    {
        return $this->rasi;
    }

    public function getRasiLord(): string
    {
        return $this->rasiLord;
    }

    /**
     * Get complete planet list.
     *
     * @return string[]
     */
    public function getPlanetList(): array
    {
        return self::PLANET_LIST;
    }
}
