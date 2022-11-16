<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\SadeSati;

final class SaturnTransit
{
    private string $saturnSign;

    private string $phase;

    private \DateTimeInterface $start;

    private \DateTimeInterface $end;

    private string $description;

    /**
     * @var null
     */
    private $isRetrograde;

    /**
     * @param null $isRetrograde
     */
    public function __construct(string $saturnSign, string $phase, \DateTimeInterface $start, \DateTimeInterface $end, string $description, $isRetrograde = null)
    {
        $this->saturnSign = $saturnSign;
        $this->phase = $phase;
        $this->start = $start;
        $this->end = $end;
        $this->description = $description;
        $this->isRetrograde = $isRetrograde;
    }

    public function getSaturnSign(): string
    {
        return $this->saturnSign;
    }

    public function getPhase(): string
    {
        return $this->phase;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return null
     */
    public function isRetrograde()
    {
        return $this->isRetrograde;
    }
}
