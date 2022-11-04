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

use Prokerala\Api\Astrology\Result\EventTiming\Nakshatra;

final class TaraBalaResult
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTimeInterface
     */
    private $start;

    /**
     * @var \DateTimeInterface
     */
    private $end;

    /**
     * @var Nakshatra
     */
    private $nakshatra;

    public function __construct(int $id, string $name, string $type, \DateTimeInterface $start, \DateTimeInterface $end, Nakshatra $nakshatra)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->start = $start;
        $this->end = $end;
        $this->nakshatra = $nakshatra;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function getNakshatra(): Nakshatra
    {
        return $this->nakshatra;
    }
}
