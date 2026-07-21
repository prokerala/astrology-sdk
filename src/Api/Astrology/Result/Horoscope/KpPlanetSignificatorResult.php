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


use Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetSignificatorList;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class KpPlanetSignificatorResult implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetSignificatorList[]
     */
    private array $planetSignificators;

    /**
     * @param \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetSignificatorList[] $planetSignificators
     */
    public function __construct(array $planetSignificators)
    {
        $this->planetSignificators = $planetSignificators;
    }


    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\KpSignificators\KpPlanetSignificatorList[]
     */
    public function getKpPositions(): array
    {
        return $this->planetSignificators;
    }
}
