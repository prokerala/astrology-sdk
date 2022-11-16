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

final class AuspiciousYoga implements ResultInterface
{
    use RawResponseTrait;

    /** @var AuspiciousYogaPeriod[] */
    private array $auspiciousYoga;

    /**
     * @param AuspiciousYogaPeriod[] $auspiciousYoga
     */
    public function __construct(array $auspiciousYoga)
    {
        $this->auspiciousYoga = $auspiciousYoga;
    }

    /**
     * @return AuspiciousYogaPeriod[]
     */
    public function getAuspiciousYoga(): array
    {
        return $this->auspiciousYoga;
    }
}
