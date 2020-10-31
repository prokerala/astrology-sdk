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
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class Papasamyam implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var float
     */
    private $totalPoints;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    private $papaSamyam;

    /**
     * @param float $totalPoints
     */
    public function __construct($totalPoints, PapaSamyamDetails $papaSamyam)
    {
        $this->totalPoints = $totalPoints;
        $this->papaSamyam = $papaSamyam;
    }

    /**
     * @return float
     */
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    public function getPapaSamyam()
    {
        return $this->papaSamyam;
    }
}
