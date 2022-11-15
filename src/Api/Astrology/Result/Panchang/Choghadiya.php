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

final class Choghadiya implements ResultInterface
{
    use RawResponseTrait;

    /**
     * Choghadiya constructor.
     *
     * @param Choghadiya\Period[] $muhurat
     */
    public function __construct(private array $muhurat)
    {
    }

    /**
     * @return Choghadiya\Period[]
     */
    public function getMuhurat()
    {
        return $this->muhurat;
    }
}
