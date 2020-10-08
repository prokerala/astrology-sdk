<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;


/**
 * Defines Pratyantardasha
 */
class Pratyantardasha
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var DashaPeriod[]
     */
    private $period;

    /**
     * Pratyantardasha constructor.
     * @param string $name
     * @param DashaPeriod[] $period
     */
    public function __construct(
        $name,
        array $period
    ){

        $this->name = $name;
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return DashaPeriod[]
     */
    public function getPeriod()
    {
        return $this->period;
    }
}
