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


use Prokerala\Api\Astrology\Result\EventTiming\Rasi;

final class ChandraBalaResult
{
    /**
     * @var Rasi
     */
    private $rasi;
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
     * @param Rasi $rasi
     * @param string $type
     * @param \DateTimeInterface $start
     * @param \DateTimeInterface $end
     */
    public function __construct(Rasi $rasi, string $type, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $this->rasi = $rasi;
        $this->type = $type;
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
     * @return Rasi
     */
    public function getRasi(): Rasi
    {
        return $this->rasi;
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
