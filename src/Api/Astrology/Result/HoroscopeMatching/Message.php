<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

final class Message
{
    private ?string $type;

    private string $description;

    public function __construct(?string $type, string $description)
    {
        $this->type = $type;
        $this->description = $description;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
