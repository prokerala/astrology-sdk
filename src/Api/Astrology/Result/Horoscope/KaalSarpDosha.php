<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api\Astrology\Result\Horoscope;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

final class KaalSarpDosha implements ResultInterface
{
    use RawResponseTrait;

    /**
     * KaalSarpDosha constructor.
     *
     * @param bool        $hasDosha
     * @param string      $description
     */
    public function __construct(private ?string $type, private ?string $doshaType, private $hasDosha, private $description)
    {
    }

    /**
     * @return null|string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return null|string
     */
    public function getDoshaType()
    {
        return $this->doshaType;
    }

    /**
     * @return bool
     */
    public function hasDosha()
    {
        return $this->hasDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return null|\stdClass
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }
}
