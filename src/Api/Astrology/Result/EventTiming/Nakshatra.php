<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\EventTiming;

use Prokerala\Api\Astrology\Result\Element\Planet;

final class Nakshatra
{
    /**
     * Nakshatra constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(private $id, private $name, private Planet $lord, private \DateTimeInterface $start, private \DateTimeInterface $end)
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
     * @return Planet
     */
    public function getLord()
    {
        return $this->lord;
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
}
