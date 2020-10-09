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

use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails;

/**
 * Defines Papasamyam.
 */
class Papasamyam
{
    /**
     * @var float
     */
    private $totalPoint;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    private $papaSamyam;

    /**
     * Papasamyam constructor.
     *
     * @param float $totalPoint
     */
    public function __construct(
        $totalPoint,
        PapaSamyamDetails $papaSamyam
    ) {
        $this->totalPoint = $totalPoint;
        $this->papaSamyam = $papaSamyam;
    }

    /**
     * @return float
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    public function getPapaSamyam()
    {
        return $this->papaSamyam;
    }
}
