<?php
/**
 * (c) Ennexa <api@prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Ennexa <api@prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api\Astrology;

/**
 * Defines NakshatraProfile
 */
class NakshatraProfile
{

    public $nakshatra;
    public $nakshatra_pada;

    /**
     * NakshatraProfile constructor.
     * @param int $nakshatra
     * @param int $nakshatra_pada
     */
    public function __construct(int $nakshatra, int $nakshatra_pada)
    {
        $this->nakshatra = $nakshatra;
        $this->nakshatra_pada = $nakshatra_pada;
    }

    /**
     * Function returns the nakshatra id
     *
     * @return int
     */
    public function getNakshatra()
    {
        return $this->nakshatra;
    }

    /**
     * Function returns the nakshatra pada
     *
     * @return int
     */
    public function getNakshatraPada()
    {
        return $this->nakshatra_pada;
    }
}
