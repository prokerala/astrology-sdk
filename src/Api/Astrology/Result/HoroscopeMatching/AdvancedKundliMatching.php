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
use Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message;

class AdvancedKundliMatching
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
     * @var \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\AdvancedGunaMilan
     */
    private $gunaMilan;
    /**
     * @var MangalDosha
     */
    private $girlMangalDoshaDetails;
    /**
     * @var MangalDosha
     */
    private $boyMangalDoshaDetails;
    /**
     * @var array
     */
    private $exceptions;

    /**
     * AdvancedKundliMatching constructor.
     * @param ProfileInfo $girlInfo
     * @param ProfileInfo $boyInfo
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\Message $message
     * @param \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\AdvancedGunaMilan $gunaMilan
     * @param MangalDosha $girlMangalDoshaDetails
     * @param MangalDosha $boyMangalDoshaDetails
     * @param string[] $exceptions
     */
    public function __construct(
        ProfileInfo $girlInfo,
        ProfileInfo $boyInfo,
        Message $message,
        AdvancedGunaMilan $gunaMilan,
        MangalDosha $girlMangalDoshaDetails,
        MangalDosha $boyMangalDoshaDetails,
        array $exceptions
    ) {

        $this->girlInfo = $girlInfo;
        $this->boyInfo = $boyInfo;
        $this->message = $message;
        $this->gunaMilan = $gunaMilan;
        $this->girlMangalDoshaDetails = $girlMangalDoshaDetails;
        $this->boyMangalDoshaDetails = $boyMangalDoshaDetails;
        $this->exceptions = $exceptions;
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
     * @return \Prokerala\Api\Astrology\Result\HoroscopeMatching\GunaMilan\AdvancedGunaMilan
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
