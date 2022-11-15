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

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class HoraTiming implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @param Hora[] $horaTiming
     */
    public function __construct(private array $horaTiming)
    {
    }

    /**
     * @return Hora[]
     */
    public function getHoraTiming(): array
    {
        return $this->horaTiming;
    }

    /**
     * @return Hora[]
     */
    public function getDayHora(): array
    {
        return array_filter($this->horaTiming, function ($hora) {
            return $hora->isDay();
        });
    }

    /**
     * @return Hora[]
     */
    public function getNightHora(): array
    {
        return array_filter($this->horaTiming, function ($hora) {
            return !$hora->isDay();
        });
    }
}
