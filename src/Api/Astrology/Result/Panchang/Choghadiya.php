<?php

namespace Prokerala\Api\Astrology\Result\Panchang;


class Choghadiya
{

    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[]
     */
    private $day;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[]
     */
    private $night;

    /**
     * AuspiciousPeriod constructor.
     * @param \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[] $day
     * @param \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[] $night
     */

    public function __construct(array $day, array $night)
    {

        $this->day = $day;
        $this->night = $night;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[]
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Choghadiya\Choghadiya[]
     */
    public function getNight()
    {
        return $this->night;
    }
}
