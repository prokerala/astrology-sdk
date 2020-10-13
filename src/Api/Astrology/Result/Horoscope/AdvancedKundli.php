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

use Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails;
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
     * @var Yoga\YogaDetails
     */
    private $yogas;
    /**
     * @var Yoga\YogaList[]
     */
    private $yogaList;
    /**
     * @var Dasha\DashaDetails[]
     */
    private $dashPeriods;

    /**
     * AdvancedKundli constructor.
     *
     * @param Yoga\YogaList[]      $yogaList
     * @param Dasha\DashaDetails[] $dashaPeriods
     */
    public function __construct(
        BirthDetails $nakshatraDetails,
        AdvancedMangalDosha $mangalDosha,
        YogaDetails $yogas,
        array $yogaList,
        array $dashaPeriods
    ) {
        $this->nakshatraDetails = $nakshatraDetails;
        $this->mangalDosha = $mangalDosha;
        $this->yogas = $yogas;
        $this->yogaList = $yogaList;
        $this->dashPeriods = $dashaPeriods;
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
     * @return Yoga\YogaDetails
     */
    public function getYogas()
    {
        return $this->yogas;
    }

    /**
     * @return Yoga\YogaList[]
     */
    public function getYogaList()
    {
        return $this->yogaList;
    }

    /**
     * @return Dasha\DashaDetails[]
     */
    public function getDashaPeriods()
    {
        return $this->dashPeriods;
    }
}
