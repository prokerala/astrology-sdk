<?php
namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails;

/**
 * Defines Papasamyam
 */
class Papasamyam
{

    /**
     * @var float
     */
    private $totalPoint;
    /**
     * @var \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    private $papaSamyam;

    /**
     * Papasamyam constructor.
     * @param float $totalPoint
     * @param \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails $papaSamyam
     */
    public function __construct(
        $totalPoint,
        PapaSamyamDetails $papaSamyam
    )
    {

        $this->totalPoint = $totalPoint;
        $this->papaSamyam = $papaSamyam;
    }

    /**
     * @return float
     */
    public function getTotalPoint()
    {
        return $this->totalPoint;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Horoscope\Papasamyam\PapasamyamDetails
     */
    public function getPapaSamyam()
    {
        return $this->papaSamyam;
    }


}
