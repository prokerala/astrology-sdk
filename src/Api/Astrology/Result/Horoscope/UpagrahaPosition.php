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

final class UpagrahaPosition implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PlanetPosition\Planet[]
     */
    private array $upagrahaPosition;

    /**
     * PlanetPosition constructor.
     *
     * @param PlanetPosition\Planet[] $upagrahaPosition
     */
    public function __construct(array $upagrahaPosition)
    {
        $this->upagrahaPosition = $upagrahaPosition;
    }

    /**
     * @return PlanetPosition\Planet[]
     */
    public function getUpagrahaPosition(): array
    {
        return $this->upagrahaPosition;
    }
}
