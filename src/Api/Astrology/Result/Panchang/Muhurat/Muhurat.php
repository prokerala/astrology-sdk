<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang\Muhurat;

final class Muhurat
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
     * @var Period[]
     */
    private $period;

    /**
     * Muhurat constructor.
     *
     * @param int      $id
     * @param string   $name
     * @param string   $type
     * @param Period[] $period
     */
    public function __construct($id, $name, $type, array $period)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->period = $period;
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
     * @return Period[]
     */
    public function getPeriod()
    {
        return $this->period;
    }
}
