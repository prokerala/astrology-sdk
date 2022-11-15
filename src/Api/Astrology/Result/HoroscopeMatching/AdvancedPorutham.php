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

final class AdvancedPorutham implements ResultInterface
{
    use RawResponseTrait;

    /**
     * AdvancedPorutham constructor.
     *
     * @param float                    $maximumPoints
     * @param float                    $totalPoints
     * @param Porutham\AdvancedMatch[] $matches
     */
    public function __construct(private Profile $girlInfo, private Profile $boyInfo, private $maximumPoints, private $totalPoints, private Message $message, private array $matches)
    {
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
