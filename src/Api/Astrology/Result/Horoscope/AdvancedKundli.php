<?php

namespace Prokerala\Api\Astrology\Result\Horoscope;
use Prokerala\Api\Astrology\Result\Horoscope\Dasha\DashaDetails;
use Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails;


class AdvancedKundli
{

    /**
     * @var Nakshatra
     */
    private $nakshatraDetails;
    /**
     * @var AdvancedMangalDosha
     */
    private $mangalDosha;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails
     */
    private $yogas;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaList[]
     */
    private $yogaList;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Dasha\DashaDetails[]
     */
    private $dashPeriods;

    /**
     * AdvancedKundli constructor.
     * @param Nakshatra $nakshatraDetails
     * @param AdvancedMangalDosha $mangalDosha
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails $yogas
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaList[] $yogaList
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Dasha\DashaDetails[] $dashaPeriods
     */
    public function __construct(
        Nakshatra $nakshatraDetails,
        AdvancedMangalDosha $mangalDosha,
        YogaDetails $yogas,
        array $yogaList,
        array $dashaPeriods
    )
    {

        $this->nakshatraDetails = $nakshatraDetails;
        $this->mangalDosha = $mangalDosha;
        $this->yogas = $yogas;
        $this->yogaList = $yogaList;
        $this->dashPeriods = $dashaPeriods;
    }

    /**
     * @return Nakshatra
     */
    public function getNakshatraDetails()
    {
        return $this->nakshatraDetails;
    }

    /**
     * @return AdvancedMangalDosha
     */
    public function getMangalDosha()
    {
        return $this->mangalDosha;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaDetails
     */
    public function getYogas()
    {
        return $this->yogas;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaList[]
     */
    public function getYogaList()
    {
        return $this->yogaList;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Dasha\DashaDetails[]
     */
    public function getDashaPeriods()
    {
        return $this->dashPeriods;
    }

}
