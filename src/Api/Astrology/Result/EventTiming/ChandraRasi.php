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

final class ChandraRasi
{
    private int $id;

    private string $name;

    private string $lord;

    private string $lordEn;

    public function __construct(int $id, string $name, string $lord, string $lordEn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
        $this->lordEn = $lordEn;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLord(): string
    {
        return $this->lord;
    }

    public function getLordEn(): string
    {
        return $this->lordEn;
    }
}
