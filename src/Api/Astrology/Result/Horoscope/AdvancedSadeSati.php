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

final class AdvancedSadeSati implements ResultInterface
{
    use RawResponseTrait;

    /**
     * SadeSati constructor.
     *
     * @param bool                     $isInSadeSati
     * @param string                   $description
     * @param SadeSati\SaturnTransit[] $transits
     */
    public function __construct(private $isInSadeSati, private ?string $transitPhase, private $description, private array $transits)
    {
    }

    /**
     * @return bool
     */
    public function isInSadeSati()
    {
        return $this->isInSadeSati;
    }

    /**
     * @return null|string
     */
    public function getTransitPhase()
    {
        return $this->transitPhase;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return SadeSati\SaturnTransit[]
     */
    public function getTransits()
    {
        return $this->transits;
    }
}
