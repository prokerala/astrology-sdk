<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

final class DishaShoolResult
{
    /**
     * @var string
     */
    private $direction;

    /**
     * @var string
     */
    private $remedy;

    /**
     * @var \DateTimeInterface
     */
    private $start;

    /**
     * @var \DateTimeInterface
     */
    private $end;

    public function __construct(string $direction, string $remedy, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->direction = $direction;
        $this->remedy = $remedy;
        $this->start = $start;
        $this->end = $end;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getRemedy(): string
    {
        return $this->remedy;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }
}
