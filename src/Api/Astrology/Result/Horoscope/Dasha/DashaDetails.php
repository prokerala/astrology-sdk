<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;


/**
 * Defines DashaDetails
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
     * @param string $dashaName
     * @param DashaPeriodDetails $dashaPeriod
     */
    public function __construct(
        string $dashaName, DashaPeriodDetails $dashaPeriod
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
