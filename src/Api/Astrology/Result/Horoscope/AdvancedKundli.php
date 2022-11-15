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

final class AdvancedKundli implements ResultInterface
{
    use RawResponseTrait;

    /**
     * AdvancedKundli constructor.
     *
     * @param Yoga\AdvancedYogaDetails[] $yogaDetails
     * @param Dasha\DashaPeriod[]        $dashaPeriods
     */
    public function __construct(private BirthDetails $nakshatraDetails, private AdvancedMangalDosha $mangalDosha, private array $yogaDetails, private array $dashaPeriods)
    {
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
