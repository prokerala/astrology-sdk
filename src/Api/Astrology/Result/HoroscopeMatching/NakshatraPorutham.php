<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class NakshatraPorutham implements ResultInterface
{
    use RawResponseTrait;
    /**
     * @var float
     */
    private $maximumPoints;
    /**
     * @var float
     */
    private $obtainedPoints;
    /**
     * @var Porutham\Match[]
     */
    private $matches;

    /**
     * NakshatraPorutham constructor.
     * @param float $maximumPoints
     * @param float $obtainedPoints
     * @param Porutham\Match[] $matches
     */
    public function __construct(
        $maximumPoints,
        $obtainedPoints,
        $matches
    ) {

        $this->maximumPoints = $maximumPoints;
        $this->obtainedPoints = $obtainedPoints;
        $this->matches = $matches;
    }

    /**
     * @return float
     */
    public function getMaximumPoints()
    {
        return $this->maximumPoints;
    }

    /**
     * @return float
     */
    public function getObtainedPoints()
    {
        return $this->obtainedPoints;
    }

    /**
     * @return Porutham\Match[]
     */
    public function getMatches()
    {
        return $this->matches;
    }


}
