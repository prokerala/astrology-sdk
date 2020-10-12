<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\Horoscope\Papasamyam;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PapaSamyamCheck implements ResultInterface
{
    use RawResponseTrait;

    /** @var Papasamyam */
    private $girlPapasamyam;
    /** @var Papasamyam */
    private $boyPapasamyam;
    /** @var string */
    private $status;
    /** @var string */
    private $message;

    /**
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
