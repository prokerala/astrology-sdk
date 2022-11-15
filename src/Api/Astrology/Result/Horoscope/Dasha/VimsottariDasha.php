<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;

final class VimsottariDasha
{
    /**
     * DashaPeriod constructor.
     *
     * @param int          $id
     * @param string       $name
     * @param Antardasha[] $antardasha
     */
    public function __construct(private $id, private $name, private \DateTimeInterface $start, private \DateTimeInterface $end, private array $antardasha)
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return Antardasha[]
     */
    public function getAntardasha()
    {
        return $this->antardasha;
    }
}
