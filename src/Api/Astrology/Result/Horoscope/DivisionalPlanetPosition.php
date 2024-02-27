<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class DivisionalPlanetPosition implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var DivisionalPlanetPositions\DivisionalPosition[]
     */
    private array $divisionalPositions;

    /**
     * @param DivisionalPlanetPositions\DivisionalPosition[] $divisionalPositions
     */
    public function __construct(
        array $divisionalPositions
    ) {
        $this->divisionalPositions = $divisionalPositions;
    }

    /**
     * @return DivisionalPlanetPositions\DivisionalPosition[]
     */
    public function getDivisionalPositions(): array
    {
        return $this->divisionalPositions;
    }
}
