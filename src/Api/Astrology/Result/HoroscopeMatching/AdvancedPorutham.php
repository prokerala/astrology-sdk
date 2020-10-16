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

use Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham\Profile;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class AdvancedPorutham implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Porutham\Profile
     */
    private $girlInfo;
    /**
     * @var Porutham\Profile
     */
    private $boyInfo;
    /**
     * @var float
     */
    private $maximumPoints;
    /**
     * @var float
     */
    private $totalPoints;
    /**
     * @var Message
     */
    private $message;
    /**
     * @var Porutham\AdvancedMatch[]
     */
    private $matches;

    /**
     * AdvancedPorutham constructor.
     * @param Porutham\Profile $girlInfo
     * @param Porutham\Profile $boyInfo
     * @param float $maximumPoints
     * @param float $totalPoints
     * @param Message $message
     * @param Porutham\AdvancedMatch[] $matches
     */
    public function __construct(
        Profile $girlInfo,
        Profile $boyInfo,
        $maximumPoints,
        $totalPoints,
        Message $message,
        array $matches
    ) {


        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->maximumPoints = $maximumPoints;
        $this->totalPoints = $totalPoints;
        $this->message = $message;
        $this->matches = $matches;
    }

    /**
     * @return Profile
     */
    public function getGirlInfo()
    {
        return $this->girlInfo;
    }

    /**
     * @return Profile
     */
    public function getBoyInfo()
    {
        return $this->boyInfo;
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
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return Porutham\AdvancedMatch[]
     */
    public function getMatches()
    {
        return $this->matches;
    }
}
