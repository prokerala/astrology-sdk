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

class ChartRasi
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[]
     */
    private $planetPosition;

    /**
     * ChartRasi constructor.
     *
     * @param int                                                               $id
     * @param string                                                            $name
     * @param \Prokerala\Api\Astrology\Result\Horoscope\PlanetPosition\Planet[] $planetPosition
     */
    public function __construct($id, $name, array $planetPosition)
    {
        $this->id = $id;
        $this->name = $name;
        $this->planetPosition = $planetPosition;
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
