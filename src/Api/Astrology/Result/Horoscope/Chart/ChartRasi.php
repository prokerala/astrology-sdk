<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Chart;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class ChartRasi implements ResultInterface
{
    use RawResponseTrait;

    private int $id;

    private string $name;

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    private array $planetPosition;

    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct(int $id, string $name, array $planetPosition)
    {
        $this->id = $id;
        $this->name = $name;
        $this->planetPosition = $planetPosition;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    public function getPlanetPosition(): array
    {
        return $this->planetPosition;
    }
}
