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

final class InauspiciousPeriod implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Muhurat\Muhurat[]
     */
    private array $muhurat;

    /**
     * InauspiciousPeriod constructor.
     *
     * @param Muhurat\Muhurat[] $muhurat
     */
    public function __construct(array $muhurat)
    {
        $this->muhurat = $muhurat;
    }

    /**
     * @return Muhurat\Muhurat[]
     */
    public function getMuhurat(): array
    {
        return $this->muhurat;
    }
}
