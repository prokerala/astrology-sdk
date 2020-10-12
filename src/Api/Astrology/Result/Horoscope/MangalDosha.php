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

class MangalDosha implements ResultInterface
{
    use RawResponseTrait;

    /** @var bool */
    private $hasMangalDosha;
    /** @var string */
    private $description;

    /**
     * @param bool   $hasMangalDosha
     * @param string $description
     */
    public function __construct($hasMangalDosha, $description)
    {
        $this->hasMangalDosha = $hasMangalDosha;
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function hasMangalDosha()
    {
        return $this->hasMangalDosha;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
