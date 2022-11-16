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

final class ChandraBala implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var ChandraBalaResult[]
     */
    private array $chandraBala;

    /**
     * @param ChandraBalaResult[] $chandraBala
     */
    public function __construct(array $chandraBala)
    {
        $this->chandraBala = $chandraBala;
    }

    /**
     * @return ChandraBalaResult[]
     */
    public function getChandraBala(): array
    {
        return $this->chandraBala;
    }
}
