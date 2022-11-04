<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Panchang;

use Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga\Period;

final class AuspiciousYogaPeriod
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var AuspiciousYoga\Period[]
     */
    private $period;
    /**
     * @param int $id
     * @param string $name
     * @param AuspiciousYoga\Period[] $period
     */
    public function __construct(int $id, string $name, array $period) {
        $this->id = $id;
        $this->name = $name;
        $this->period = $period;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AuspiciousYoga\Period[]
     */
    public function getPeriod(): array
    {
        return $this->period;
    }
}
