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

final class AdvancedMangalDosha implements ResultInterface
{
    use RawResponseTrait;

    private bool $hasDosha;

    private string $description;

    private bool $hasException;

    private ?string $type;

    /**
     * @var string[]
     */
    private array $exceptions;

    /**
     * @var string[]
     */
    private array $remedies;

    /**
     * AdvancedMangalDosha constructor.
     *
     * @param string[] $exceptions
     * @param string[] $remedies
     */
    public function __construct(
        bool $hasDosha,
        string $description,
        bool $hasException,
        ?string $type,
        array $exceptions,
        array $remedies
    ) {
        $this->hasDosha = $hasDosha;
        $this->description = $description;
        $this->hasException = $hasException;
        $this->type = $type;
        $this->exceptions = $exceptions;
        $this->remedies = $remedies;
    }

    public function hasDosha(): bool
    {
        return $this->hasDosha;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function hasException(): bool
    {
        return $this->hasException;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string[]
     */
    public function getExceptions(): array
    {
        return $this->exceptions;
    }

    /**
     * @return string[]
     */
    public function getRemedies(): array
    {
        return $this->remedies;
    }
}
