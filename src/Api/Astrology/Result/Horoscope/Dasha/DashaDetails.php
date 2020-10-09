<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;

/**
 * Defines DashaDetails.
 */
class DashaDetails
{
    /**
     * @var string
     */
    private $dashaName;
    /**
     * @var DashaPeriodDetails
     */
    private $dashaPeriod;

    /**
     * DashaDetails constructor.
     */
    public function __construct(
        string $dashaName,
        DashaPeriodDetails $dashaPeriod
    ) {
        $this->dashaName = $dashaName;
        $this->dashaPeriod = $dashaPeriod;
    }

    /**
     * @return string
     */
    public function getDashaName()
    {
        return $this->dashaName;
    }

    /**
     * @return DashaPeriodDetails
     */
    public function getDashaPeriod()
    {
        return $this->dashaPeriod;
    }
}
