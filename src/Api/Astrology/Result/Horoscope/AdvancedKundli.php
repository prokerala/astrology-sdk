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

class AdvancedKundli implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var BirthDetails
     */
    private $nakshatraDetails;
    /**
     * @var AdvancedMangalDosha
     */
    private $mangalDosha;
    /**
     * @var Yoga\AdvancedYogaDetails[]
     */
    private $yogaDetails;
    /**
     * @var Dasha\DashaPeriod[]
     */
    private $dashaPeriods;

    /**
     * AdvancedKundli constructor.
     *
     * @param Yoga\AdvancedYogaDetails[] $yogaDetails
     * @param Dasha\DashaPeriod[]        $dashaPeriods
     */
    public function __construct(
        BirthDetails $nakshatraDetails,
        AdvancedMangalDosha $mangalDosha,
        array $yogaDetails,
        array $dashaPeriods
    ) {
        $this->nakshatraDetails = $nakshatraDetails;
        $this->mangalDosha = $mangalDosha;
        $this->yogaDetails = $yogaDetails;
        $this->dashaPeriods = $dashaPeriods;
    }

    /**
     * @return BirthDetails
     */
    public function getNakshatraDetails()
    {
        return $this->nakshatraDetails;
    }

    /**
     * @return AdvancedMangalDosha
     */
    public function getMangalDosha()
    {
        return $this->mangalDosha;
    }

    /**
     * @return Yoga\AdvancedYogaDetails[]
     */
    public function getYogaDetails()
    {
        return $this->yogaDetails;
    }

    /**
     * @return Dasha\DashaPeriod[]
     */
    public function getDashaPeriods()
    {
        return $this->dashaPeriods;
    }
}
