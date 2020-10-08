<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;


/**
 * Defines DashaPeriodDetails
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
     * @param DashaPeriod $mahadasha
     * @param DashaPeriod[] $anthardasha
     * @param Pratyantardasha[] $pratyantardasha
     */
    public function __construct(
        DashaPeriod $mahadasha,
        array $anthardasha,
        array $pratyantardasha
    )
    {

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
