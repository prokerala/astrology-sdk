<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang\Choghadiya;

final class Period
{
    /**
     * Period constructor.
     *
     * @param int         $id
     * @param string      $name
     * @param string      $type
     * @param bool        $isDay
     */
    public function __construct(private $id, private $name, private $type, private ?string $vela, private $isDay, private \DateTimeInterface $start, private \DateTimeInterface $end)
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return null|string
     */
    public function getVela()
    {
        return $this->vela;
    }

    /**
     * @return bool
     */
    public function getIsDay()
    {
        return $this->isDay;
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
