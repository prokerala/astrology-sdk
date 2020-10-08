<?php
namespace Prokerala\Api\Astrology\Result\Horoscope\Dasha;


/**
 * Defines DashaPeriod
 */
class DashaPeriod
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * DashaPeriod constructor.
     * @param string $name
     * @param string $start
     * @param string $end
     */
    public function __construct(
        $name,
        $start,
        $end
    )
    {

        $this->name = $name;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }
}
