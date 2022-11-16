<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang\Muhurat;

final class Muhurat
{
    private int $id;

    private string $name;

    private string $type;

    /**
     * @var Period[]
     */
    private array $period;

    /**
     * Muhurat constructor.
     *
     * @param Period[] $period
     */
    public function __construct(int $id, string $name, string $type, array $period)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->period = $period;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Period[]
     */
    public function getPeriod(): array
    {
        return $this->period;
    }
}
