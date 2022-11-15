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

final class Kundli implements ResultInterface
{
    use RawResponseTrait;

    /**
     * Kundli constructor.
     *
     * @param Yoga\YogaDetails[] $yogaDetails
     */
    public function __construct(private BirthDetails $nakshatraDetails, private MangalDosha $mangalDosha, private array $yogaDetails)
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
     * @return MangalDosha
     */
    public function getMangalDosha()
    {
        return $this->mangalDosha;
    }

    /**
     * @return Yoga\YogaDetails[]
     */
    public function getYogaDetails()
    {
        return $this->yogaDetails;
    }
}
