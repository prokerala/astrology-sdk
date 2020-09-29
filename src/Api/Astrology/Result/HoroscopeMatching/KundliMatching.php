<?php

namespace Prokerala\Api\Astrology\Result\HoroscopeMatching;

use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan;
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message;

class KundliMatching
{
    /**
     * @var ProfileInfo
     */
    public $girlInfo;

    /**
     * @var ProfileInfo
     */
    public $boyInfo;

    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan
     */
    public $gunaMilan;

    /**
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\GunaMilan
     */
    public $message;

    /**
     * KundliMatching constructor.
     */
    public function __construct(ProfileInfo $girlInfo, ProfileInfo $boyInfo, GunaMilan $gunaMilan, Message $message) {
        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->gunaMilan = $gunaMilan;
        $this->message = $message;
    }

    public function getGirlInfo() {
        return $this->girlInfo;
    }

    public function getBoyInfo() {
        return $this->boyInfo;
    }

    public function getGunaMilan() {
        return $this->gunaMilan;
    }

    public function getMessage() {
        return $this->message;
    }
}
