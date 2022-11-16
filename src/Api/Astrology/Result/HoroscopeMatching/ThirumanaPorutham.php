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

    private float $maximumPoints;

    private float $obtainedPoints;

    /**
     * @var Porutham\BasicMatch[]
     */
    private array $matches;

    private Message $message;

    /**
     * ThirumanaPorutham constructor.
     *
     * @param Porutham\BasicMatch[] $matches
     */
    public function __construct(
        float $maximumPoints,
        float $obtainedPoints,
        Message $message,
        array $matches
    ) {
        $this->maximumPoints = $maximumPoints;
        $this->obtainedPoints = $obtainedPoints;
        $this->matches = $matches;
        $this->message = $message;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function getMaximumPoints(): float
    {
        return $this->maximumPoints;
    }

    public function getObtainedPoints(): float
    {
        return $this->obtainedPoints;
    }

    /**
     * @return Porutham\BasicMatch[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }
}
