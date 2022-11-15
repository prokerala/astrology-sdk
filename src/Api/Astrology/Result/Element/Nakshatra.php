<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Element;

final class Nakshatra
{
    /**
     * Nakshatra constructor.
     *
     * @param int    $id
     * @param string $name
     * @param int    $pada
     */
    public function __construct(private $id, private $name, private Planet $lord, private $pada)
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
     * @return int
     */
    public function getPada()
    {
        return $this->pada;
    }
}
