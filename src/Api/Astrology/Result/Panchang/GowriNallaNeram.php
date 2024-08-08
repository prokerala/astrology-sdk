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

use Prokerala\Api\Astrology\Result\Horoscope\Chandrashtama\Chandrashtama;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class GowriNallaNeram implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var GowriNallaNeram\Period[]
     */
    private array $muhurat;

    /**
     * Choghadiya constructor.
     *
     * @param GowriNallaNeram\Period[] $muhurat
     */
    public function __construct(array $muhurat)
    {
        $this->muhurat = $muhurat;
    }

    /**
     * @return GowriNallaNeram\Period[]
     */
    public function getMuhurat(): array
    {
        return $this->muhurat;
    }
}
