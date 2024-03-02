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

use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Result\Element\Bhava;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class DivisionalPosition implements ResultInterface
{
    use RawResponseTrait;

    private Bhava $house;

    /**
     * @var DivisionalPlanetPosition[]
     */
    private array $planetPositions;
    private Rasi $rasi;

    /**
     * @param DivisionalPlanetPosition[] $planetPositions
     */
    public function __construct(
        Bhava $house,
        Rasi $rasi,
        array $planetPositions
    ) {
        $this->house = $house;
        $this->rasi = $rasi;
        $this->planetPositions = $planetPositions;
    }

    public function getHouse(): Bhava
    {
        return $this->house;
    }

    /**
     * @return DivisionalPlanetPosition[]
     */
    public function getPlanetPositions(): array
    {
        return $this->planetPositions;
    }

    public function getRasi(): Rasi
    {
        return $this->rasi;
    }
}
