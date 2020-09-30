<?php

namespace Prokerala\Api\Astrology\Result\Panchang\Muhurat;

class Muhurat
{
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;

    /**
     * MuhuratTime constructor.
     * @param string $start
     * @param string $end
     */

    public function __construct($start, $end)
    {

        $this->start = $start;
        $this->end = $end;
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
