<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\DivisionalPlanetPositions;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class HouseDivision implements ResultInterface
{
    use RawResponseTrait;

    private int $id;
    private int $number;
    private string $name;

    public function __construct(
        int $id,
        int $number,
        string $name
    ) {
        $this->id = $id;
        $this->number = $number;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
