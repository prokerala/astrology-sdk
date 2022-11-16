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

final class Solstice implements ResultInterface
{
    use RawResponseTrait;

    private SolsticeResult $solstice;

    public function __construct(SolsticeResult $solstice)
    {
        $this->solstice = $solstice;
    }

    public function getDishaShool(): SolsticeResult
    {
        return $this->solstice;
    }
}
