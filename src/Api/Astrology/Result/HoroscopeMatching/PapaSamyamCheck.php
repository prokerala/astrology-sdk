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

final class PapaSamyamCheck implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private Papasamyam $girlPapasamyam, private Papasamyam $boyPapasamyam, private Message $message)
    {
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
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }
}
