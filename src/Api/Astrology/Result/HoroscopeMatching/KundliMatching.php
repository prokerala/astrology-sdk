<?php

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
     * @var Message
     */
    private $message;
    /**
     * @var GunaMilan
     */
    private $gunaMilan;

    /**
     * KundliMatching constructor.
     * @param ProfileInfo $girlInfo
     * @param ProfileInfo $boyInfo
     * @param Message $message
     * @param GunaMilan $gunaMilan
     */
    public function __construct(
        ProfileInfo $girlInfo,
        ProfileInfo $boyInfo,
        Message $message,
        GunaMilan $gunaMilan

    )
    {

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
