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
    public const PRATIPADA = 1;
    public const DWITIYA = 2;
    public const TRITIYA = 3;
    public const CHATURTHI = 4;
    public const PANCHAMI = 5;
    public const SHASHTHI = 6;
    public const SAPTAMI = 7;
    public const ASHTAMI = 8;
    public const NAVAMI = 9;
    public const DASHAMI = 10;
    public const EKADASHI = 11;
    public const DWADASHI = 12;
    public const TRAYODASHI = 13;
    public const CHATURDASHI = 14;
    public const PURNIMA = 15;
    public const AMAVASYA = 16;

    /**
     * @param int    $index
     * @param int    $id
     * @param string $name
     * @param string $paksha
     */
    public function __construct(private $index, private $id, private $name, private $paksha)
    {
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
