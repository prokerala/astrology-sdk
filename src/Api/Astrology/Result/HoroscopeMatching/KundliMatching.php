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
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message;

class KundliMatching
{
    /**
     * @var ProfileInfo
     */
    private $girlInfo;
    /**
     * @var ProfileInfo
     */
    private $boyInfo;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message
     */
    private $message;
    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan
     */
    private $gunaMilan;

    /**
     * KundliMatching constructor.
     * @param ProfileInfo $girlInfo
     * @param ProfileInfo $boyInfo
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message $message
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan $gunaMilan
     */
    public function __construct(
        ProfileInfo $girlInfo,
        ProfileInfo $boyInfo,
        Message $message,
        GunaMilan $gunaMilan
    ) {
        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->message = $message;
        $this->gunaMilan = $gunaMilan;
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
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan
     */
    public function getGunaMilan()
    {
        return $this->gunaMilan;
    }
}
