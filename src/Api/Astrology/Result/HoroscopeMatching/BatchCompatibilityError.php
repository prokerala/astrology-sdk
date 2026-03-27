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

final class BatchCompatibilityError
{
    private ?string $status;

    private string $description;

    public function __construct(?string $status, string $description)
    {
        $this->status = $status;
        $this->description = $description;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
