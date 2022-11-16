<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class MangalDosha implements ResultInterface
{
    use RawResponseTrait;

    private bool $hasDosha;

    private string $description;

    /**
     * MangalDosha constructor.
     */
    public function __construct(bool $hasDosha, string $description)
    {
        $this->hasDosha = $hasDosha;
        $this->description = $description;
    }

    public function hasDosha(): bool
    {
        return $this->hasDosha;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getApiResponse(): ?\stdClass
    {
        return $this->apiResponse;
    }
}
