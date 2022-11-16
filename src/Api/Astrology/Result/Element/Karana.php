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
    public const BAVA = 0;
    public const BALAVA = 1;
    public const KAULAVA = 2;
    public const TAITILA = 3;
    public const GARIJA = 4;
    public const VANIJA = 5;
    public const VISHTI = 6;
    public const KIMSTUGHNA = 7;
    public const SHAKUNI = 8;
    public const CHATUSHPADA = 9;
    public const NAGA = 10;

    public const KARANA_LIST = [
        'Bava', 'Balava', 'Kaulava', 'Taitila',
        'Garija', 'Vanija', 'Vishti', 'Shakuni',
        'Chatushpada', 'Naga', 'Kimstughna',
    ];

    private int $id;

    private int $index;

    private string $name;

    public function __construct(int $id, int $index, string $name)
    {
        $this->id = $id;
        $this->index = $index;
        $this->name = $name;
    }

    /**
     * Get karana name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get karana index.
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * Get karana id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get a list of all Karanas.
     *
     * @return string[]
     */
    public function getKaranaList(): array
    {
        return self::KARANA_LIST;
    }
}
