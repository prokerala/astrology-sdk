<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;

final class PapasamyamDetails
{
    /**
     * PapasamyamDetails constructor.
     *
     * @param PapaPlanet[] $papaPlanet
     */
    public function __construct(private array $papaPlanet)
    {
    }

    /**
     * @return PapaPlanet[]
     */
    public function getPapaPlanet()
    {
        return $this->papaPlanet;
    }
}
