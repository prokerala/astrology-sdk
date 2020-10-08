<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;

class PapaSamyamCheck
{

    /**
     * @var Papasamyam
     */
    private $girlPapasamyam;
    /**
     * @var Papasamyam
     */
    private $boyPapasamyam;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $message;

    /**
     * PapaSamyamCheck constructor.
     * @param Papasamyam $girlPapasamyam
     * @param Papasamyam $boyPapasamyam
     * @param string $status
     * @param string $message
     */
    public function __construct(
        Papasamyam $girlPapasamyam,
        Papasamyam $boyPapasamyam,
        $status,
        $message
    ) {


        $this->girlPapasamyam = $girlPapasamyam;
        $this->boyPapasamyam = $boyPapasamyam;
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * @return Papasamyam
     */
    public function getGirlPapasamyam()
    {
        return $this->girlPapasamyam;
    }

    /**
     * @return Papasamyam
     */
    public function getBoyPapasamyam()
    {
        return $this->boyPapasamyam;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }


}
