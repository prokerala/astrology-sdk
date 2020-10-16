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
use \Prokerala\Api\Astrology\Result\Element\Planet;

class Nakshatra
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
     * @var Planet
     */
    private $lord;
    /**
     * @var DateTimeInterface
     */
    private $start;
    /**
     * @var DateTimeInterface
     */
    private $end;

    /**
     * Nakshatra constructor.
     * @param int $id
     * @param string $name
     * @param Planet $lord
     * @param DateTimeInterface $start
     * @param DateTimeInterface $end
     */
    public function __construct($id, $name, Planet $lord, DateTimeInterface $start, DateTimeInterface $end)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
        $this->start = $start;
        $this->end = $end;
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
