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

use DateTimeInterface;

final class Pratyantardasha
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
     * @var DateTimeInterface
     */
    private $start;
    /**
     * @var DateTimeInterface
     */
    private $end;

    /**
     * Pratyantardasha constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(
        $id,
        $name,
        DateTimeInterface $start,
        DateTimeInterface $end
    ) {
        $this->id = $id;
        $this->name = $name;
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
