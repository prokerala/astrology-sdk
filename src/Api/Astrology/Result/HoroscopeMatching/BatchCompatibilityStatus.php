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

final class BatchCompatibilityStatus
{
    private string $status;

    private ?string $error;

    /**
     * @var null|BatchCompatibilityMessage
     */
    private ?BatchCompatibilityMessage $result;

    public function __construct(
        string $status,
        ?string $error,
        ?BatchCompatibilityMessage $result,
    )
    {
        $this->status = $status;
        $this->error = $error;
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @return null|BatchCompatibilityMessage
     */
    public function getResult(): ?BatchCompatibilityMessage
    {
        return $this->result;
    }
}
