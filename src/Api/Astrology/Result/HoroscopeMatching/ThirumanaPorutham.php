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

final class ThirumanaPorutham implements ResultInterface
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
     * @var Porutham\BasicMatch[]
     */
    private $matches;
    /**
     * @var Message
     */
    private $message;

    /**
     * ThirumanaPorutham constructor.
     *
     * @param float            $maximumPoints
     * @param float            $obtainedPoints
     * @param Porutham\BasicMatch[] $matches
     */
    public function __construct(
        $maximumPoints,
        $obtainedPoints,
        Message $message,
        array $matches
    ) {
        $this->maximumPoints = $maximumPoints;
        $this->obtainedPoints = $obtainedPoints;
        $this->matches = $matches;
        $this->message = $message;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
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
     * @return Porutham\BasicMatch[]
     */
    public function getMatches()
    {
        return $this->matches;
    }
}
