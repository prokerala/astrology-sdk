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

use DateTimeInterface;

class Tithi
{

    /**
     * @var int
     */
    private $index;
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
    private $paksha;
    /**
     * @var DateTimeInterface
     */
    private $start;
    /**
     * @var DateTimeInterface
     */
    private $end;

    /**
     * Tithi constructor.
     * @param int $index
     * @param int $id
     * @param string $name
     * @param string $paksha
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     */
    public function __construct(
        $index,
        $id,
        $name,
        $paksha,
        DateTimeInterface $start,
        DateTimeInterface $end
    )
    {
        $this->index = $index;
        $this->id = $id;
        $this->name = $name;
        $this->paksha = $paksha;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
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
     * @return string
     */
    public function getPaksha()
    {
        return $this->paksha;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return DateTimeInterface
     */
    public function getEnd()
    {
        return $this->end;
    }


}
