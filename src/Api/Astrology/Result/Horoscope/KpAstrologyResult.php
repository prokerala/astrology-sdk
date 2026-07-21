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


use Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpHouse;
use Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetPosition;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class KpAstrologyResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var KpHouse[]
     */
    private  array $houses;

    /**
     * @var KpPlanetPosition[]
     */
    private  array $planetPositions;


    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpHouse[] $houses
     * @param \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetPosition[] $planetPositions
     */
    public function __construct(array $houses, array $planetPositions)
    {
        $this->houses = $houses;
        $this->planetPositions = $planetPositions;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetPosition[]
     */
    public function getPlanetPosition(): array
    {
        return $this->planetPositions;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpHouse[]
     */
    public function getHouses(): array
    {
        return $this->houses;
    }


}
