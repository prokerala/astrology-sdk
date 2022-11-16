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

final class SadeSati implements ResultInterface
{
    use RawResponseTrait;

    private bool $isInSadeSati;

    private ?string $transitPhase;

    private string $description;

    public function __construct(bool $isInSadeSati, ?string $transitPhase, string $description)
    {
        $this->isInSadeSati = $isInSadeSati;
        $this->transitPhase = $transitPhase;
        $this->description = $description;
    }

    public function isInSadeSati(): bool
    {
        return $this->isInSadeSati;
    }

    public function getTransitPhase(): ?string
    {
        return $this->transitPhase;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
