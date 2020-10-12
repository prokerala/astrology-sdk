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

class Period
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
     * @var null|string
     */
    private $vela;
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
     * Period constructor.
     *
     * @param int         $id
     * @param string      $name
     * @param string      $type
     * @param null|string $vela
     * @param bool        $isDay
     */
    public function __construct(
        $id,
        $name,
        $type,
        $vela,
        $isDay,
        \DateTimeInterface $start,
        \DateTimeInterface $end
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->vela = $vela;
        $this->isDay = $isDay;
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
