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
 * Defines DashaPeriodDetails.
 */
class DashaPeriodDetails
{
    /**
     * @var DashaPeriod
     */
    private $mahadasha;
    /**
     * @var DashaPeriod[]
     */
    private $anthardasha;
    /**
     * @var Pratyantardasha[]
     */
    private $pratyantardasha;

    /**
     * DashaPeriodDetails constructor.
     *
     * @param DashaPeriod[]     $anthardasha
     * @param Pratyantardasha[] $pratyantardasha
     */
    public function __construct(
        DashaPeriod $mahadasha,
        array $anthardasha,
        array $pratyantardasha
    ) {
        $this->mahadasha = $mahadasha;
        $this->anthardasha = $anthardasha;
        $this->pratyantardasha = $pratyantardasha;
    }

    /**
     * @return DashaPeriod
     */
    public function getMahadasha()
    {
        return $this->mahadasha;
    }

    /**
     * @return DashaPeriod[]
     */
    public function getAnthardasha()
    {
        return $this->anthardasha;
    }

    /**
     * @return Pratyantardasha[]
     */
    public function getPratyantardasha()
    {
        return $this->pratyantardasha;
    }
}
