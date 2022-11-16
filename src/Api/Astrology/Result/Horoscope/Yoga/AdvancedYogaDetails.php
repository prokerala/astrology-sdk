<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;

final class AdvancedYogaDetails
{
    private string $name;

    private string $description;

    /**
     * @var Yoga[]
     */
    private array $yogaList;

    /**
     * @param Yoga[] $yogaList
     */
    public function __construct(
        string $name,
        string $description,
        array $yogaList
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->yogaList = $yogaList;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Yoga[]
     */
    public function getYogaList(): array
    {
        return $this->yogaList;
    }
}
