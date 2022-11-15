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

use Prokerala\Api\Astrology\Traits\StringableTrait;

final class Planet
{
    use StringableTrait;

    /**
     * Lord constructor.
     *
     * @param int    $id
     * @param string $name
     * @param string $vedicName
     */
    public function __construct(private $id, private $name, private $vedicName)
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
    public function getVedicName()
    {
        return $this->vedicName;
    }
}
