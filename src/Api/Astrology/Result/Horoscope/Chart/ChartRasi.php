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

    /**
     * @param int                                                               $id
     * @param string                                                            $name
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct(private $id, private $name, private array $planetPosition)
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    public function getPlanetPosition()
    {
        return $this->planetPosition;
    }
}
