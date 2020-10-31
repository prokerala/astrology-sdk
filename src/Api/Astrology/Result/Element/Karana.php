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

final class Karana
{
    const BAVA = 0;
    const BALAVA = 1;
    const KAULAVA = 2;
    const TAITILA = 3;
    const GARIJA = 4;
    const VANIJA = 5;
    const VISHTI = 6;
    const KIMSTUGHNA = 7;
    const SHAKUNI = 8;
    const CHATUSHPADA = 9;
    const NAGA = 10;

    const KARANA_LIST = [
        'Bava', 'Balava', 'Kaulava', 'Taitila',
        'Garija', 'Vanija', 'Vishti', 'Shakuni',
        'Chatushpada', 'Naga', 'Kimstughna',
    ];

    /** @var int */
    protected $id;
    /** @var int */
    private $index;
    /** @var string */
    private $name;

    /**
     * @param int    $id
     * @param int    $index
     * @param string $name
     */
    public function __construct($id, $index, $name)
    {
        $this->id = $id;
        $this->index = $index;
        $this->name = $name;
    }

    /**
     * Get karana name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get karana index.
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Get karana id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get a list of all Karanas.
     *
     * @return string[]
     */
    public function getKaranaList()
    {
        return self::KARANA_LIST;
    }
}
