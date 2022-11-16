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

    private ProfileInfo $girlInfo;

    private ProfileInfo $boyInfo;

    private Message $message;

    private GunaMilan $gunaMilan;

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

    public function getGirlInfo(): ProfileInfo
    {
        return $this->girlInfo;
    }

    public function getBoyInfo(): ProfileInfo
    {
        return $this->boyInfo;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function getGunaMilan(): GunaMilan
    {
        return $this->gunaMilan;
    }
}
