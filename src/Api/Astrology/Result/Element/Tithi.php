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

final class Tithi
{
    const PRATIPADA = 1;
    const DWITIYA = 2;
    const TRITIYA = 3;
    const CHATURTHI = 4;
    const PANCHAMI = 5;
    const SHASHTHI = 6;
    const SAPTAMI = 7;
    const ASHTAMI = 8;
    const NAVAMI = 9;
    const DASHAMI = 10;
    const EKADASHI = 11;
    const DWADASHI = 12;
    const TRAYODASHI = 13;
    const CHATURDASHI = 14;
    const PURNIMA = 15;
    const AMAVASYA = 16;

    /** @var string */
    private $paksha;
    /** @var int */
    private $id;
    /** @var int */
    private $index;
    /** @var string */
    private $name;

    /**
     * @param int    $index
     * @param int    $id
     * @param string $name
     * @param string $paksha
     */
    public function __construct($index, $id, $name, $paksha)
    {
        $this->id = $id;
        $this->paksha = $paksha;
        $this->index = $index;
        $this->name = $name;
    }

    /**
     * Get tithi name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get tithi sequential index.
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Get tithi id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get tithi paksha.
     *
     * @return string
     */
    public function getPaksha()
    {
        return $this->paksha;
    }
}
