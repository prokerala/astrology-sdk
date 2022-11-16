<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan;

final class GunaKoot
{
    private int $id;

    private string $name;

    private string $girlKoot;

    private string $boyKoot;

    private float $maximumPoints;

    private float $obtainedPoints;

    private string $description;

    /**
     * GunaKoot constructor.
     */
    public function __construct(
        int $id,
        string $name,
        string $girlKoot,
        string $boyKoot,
        float $maximumPoints,
        float $obtainedPoints,
        string $description
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->girlKoot = $girlKoot;
        $this->boyKoot = $boyKoot;
        $this->maximumPoints = $maximumPoints;
        $this->obtainedPoints = $obtainedPoints;
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

    public function getGirlKoot(): string
    {
        return $this->girlKoot;
    }

    public function getBoyKoot(): string
    {
        return $this->boyKoot;
    }

    public function getMaximumPoints(): float
    {
        return $this->maximumPoints;
    }

    public function getObtainedPoints(): float
    {
        return $this->obtainedPoints;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
