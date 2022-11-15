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

final class Yoga implements ResultInterface
{
    use RawResponseTrait;

    /**
     * Kundli constructor.
     *
     * @param Yoga\AdvancedYogaDetails[] $yogaDetails
     */
    public function __construct(private array $yogaDetails)
    {
    }

    /**
     * @return Yoga\AdvancedYogaDetails[]
     */
    public function getYogaDetails()
    {
        return $this->yogaDetails;
    }
}
