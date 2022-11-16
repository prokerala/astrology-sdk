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

    private ProfileInfo $girlInfo;

    private ProfileInfo $boyInfo;

    private Message $message;

    private AdvancedGunaMilan $gunaMilan;

    private MangalDosha $girlMangalDoshaDetails;

    private MangalDosha $boyMangalDoshaDetails;

    /** @var string[] */
    private array $exceptions;

    /**
     * AdvancedKundliMatching constructor.
     *
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

    public function getGunaMilan(): AdvancedGunaMilan
    {
        return $this->gunaMilan;
    }

    public function getGirlMangalDoshaDetails(): MangalDosha
    {
        return $this->girlMangalDoshaDetails;
    }

    public function getBoyMangalDoshaDetails(): MangalDosha
    {
        return $this->boyMangalDoshaDetails;
    }

    /**
     * @return string[]
     */
    public function getExceptions(): array
    {
        return $this->exceptions;
    }
}
