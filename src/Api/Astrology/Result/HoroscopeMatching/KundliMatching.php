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

use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class KundliMatching implements ResultInterface
{
    use RawResponseTrait;

    public function __construct(private ProfileInfo $girlInfo, private ProfileInfo $boyInfo, private Message $message, private GunaMilan $gunaMilan)
    {
    }

    /**
     * @return ProfileInfo
     */
    public function getGirlInfo()
    {
        return $this->girlInfo;
    }

    /**
     * @return ProfileInfo
     */
    public function getBoyInfo()
    {
        return $this->boyInfo;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return GunaMilan
     */
    public function getGunaMilan()
    {
        return $this->gunaMilan;
    }
}
