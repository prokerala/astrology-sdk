<?php

namespace Prokerala\Api\Astrology\Result\Panchang;

class AuspiciousPeriod
{


    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $abhijitMuhurat;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    private $amritKaal;
    /**
     * @var \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    private $brahmaMuhurat;

    /**
     * AuspiciousPeriod constructor.
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $abhijitMuhurat
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[] $amritKaal
     * @param \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat $brahmaMuhurat
     */

    public function __construct($abhijitMuhurat, $amritKaal, $brahmaMuhurat)
    {

        $this->abhijitMuhurat = $abhijitMuhurat;
        $this->amritKaal = $amritKaal;
        $this->brahmaMuhurat = $brahmaMuhurat;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getAbhijitMuhurat()
    {
        return $this->abhijitMuhurat;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat[]
     */
    public function getAmritKaal()
    {
        return $this->amritKaal;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Panchang\Muhurat\Muhurat
     */
    public function getBrahmaMuhurat()
    {
        return $this->brahmaMuhurat;
    }


}
