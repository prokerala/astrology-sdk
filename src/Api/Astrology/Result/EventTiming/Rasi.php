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

final class Rasi
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $lord;

    /**
     * @param int    $id
     * @param string $name
     * @param string $lord
     */
    public function __construct($id, $name, $lord)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
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
    public function getLord()
    {
        return $this->lord;
    }
}
