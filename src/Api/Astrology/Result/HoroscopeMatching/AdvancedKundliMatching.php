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

use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\AdvancedGunaMilan;
use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class AdvancedKundliMatching implements ResultInterface
{
    use RawResponseTrait;

    /**
     * AdvancedKundliMatching constructor.
     *
     * @param string[] $exceptions
     */
    public function __construct(private ProfileInfo $girlInfo, private ProfileInfo $boyInfo, private Message $message, private AdvancedGunaMilan $gunaMilan, private MangalDosha $girlMangalDoshaDetails, private MangalDosha $boyMangalDoshaDetails, private array $exceptions)
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
     * @return AdvancedGunaMilan
     */
    public function getGunaMilan()
    {
        return $this->gunaMilan;
    }

    /**
     * @return MangalDosha
     */
    public function getGirlMangalDoshaDetails()
    {
        return $this->girlMangalDoshaDetails;
    }

    /**
     * @return MangalDosha
     */
    public function getBoyMangalDoshaDetails()
    {
        return $this->boyMangalDoshaDetails;
    }

    /**
     * @return string[]
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }
}
