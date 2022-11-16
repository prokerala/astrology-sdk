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

final class VimsottariDasha implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var Dasha\VimsottariDasha[]
     */
    private array $dashaPeriods;

    /**
     * @param Dasha\VimsottariDasha[] $dashaPeriods
     */
    public function __construct(
        array $dashaPeriods
    ) {
        $this->dashaPeriods = $dashaPeriods;
    }

    /**
     * @return Dasha\VimsottariDasha[]
     */
    public function getDashaPeriods(): array
    {
        return $this->dashaPeriods;
    }
}
