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

class Zodiac
{
    const MESHA = 0;
    const VRISHABHA = 1;
    const MITHUNA = 2;
    const KARKA = 3;
    const SIMHA = 4;
    const KANYA = 5;
    const TULA = 6;
    const VRISCHIKA = 7;
    const DHANU = 8;
    const MAKARA = 9;
    const KUMBHA = 10;
    const MEENA = 11;

    const ZODIAC_LIST = [
        'Mesha', 'Vrishabha', 'Mithuna', 'Karka',
        'Simha', 'Kanya', 'Tula', 'Vrischika',
        'Dhanu', 'Makara', 'Kumbha', 'Meena',
    ];

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
    public function __construct($id, $name, $lord = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
    }

    /**
     * Get sign name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get sign id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Rasi lord.
     *
     * @return string
     */
    public function getLord()
    {
        return $this->lord;
    }

    /**
     * Get full zodiac sign list.
     *
     * @return array
     */
    public function getZodiacList()
    {
        return self::ZODIAC_LIST;
    }
}
