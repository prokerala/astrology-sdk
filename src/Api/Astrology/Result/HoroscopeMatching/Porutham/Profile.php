<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching\Porutham;

use Prokerala\Api\Astrology\Result\Nakshatra;
use Prokerala\Api\Astrology\Result\Rasi;

class Profile
{
    /**
     * @var \Prokerala\Api\Astrology\Result\Nakshatra
     */
    private $nakshatra;
    /**
     * @var \Prokerala\Api\Astrology\Result\Rasi
     */
    private $rasi;

    /**
     * Profile constructor.
     * @param Nakshatra $nakshatra
     * @param Rasi $rasi
     */
    public function __construct(Nakshatra $nakshatra, Rasi $rasi)
    {

        $this->nakshatra = $nakshatra;
        $this->rasi = $rasi;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Nakshatra
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Rasi
     */
    public function getRasi()
    {
        return $this->rasi;
    }
}
