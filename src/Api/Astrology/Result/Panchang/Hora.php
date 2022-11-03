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

use Prokerala\Api\Astrology\Result\Element\Planet;

final class Hora
{
    /**
     * @var Planet
     */
    private $hora;
    /**
     * @var string
     */
    private $type;
    /**
     * @var bool
     */
    private $isDay;
    /**
     * @var \DateTimeInterface
     */
    private $start;
    /**
     * @var \DateTimeInterface
     */
    private $end;
    /**
     * @param Planet $hora
     * @param string $type
     * @param bool $isDay
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     */
    public function __construct(Planet $hora, string $type, bool $isDay, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->hora = $hora;
        $this->type = $type;
        $this->isDay = $isDay;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    /**
     * @return Planet
     */
    public function getHora(): Planet
    {
        return $this->hora;
    }

    /**
     * @return bool
     */
    public function isDay(): bool
    {
        return $this->isDay;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}
