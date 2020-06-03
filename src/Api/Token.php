<?php
/**
 * (c) Vimal <api@api.prokerala.com>
 *
 * This source file is subject to the MIT license.
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Vimal <api@api.prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */

namespace Prokerala\Api;

/**
 * Defines the Tithi contains Id, Name, Start, End
 *
 * PHP version 5
 *
 * @category API_SDK
 * @author   Vimal <api@api.prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 * @version  GIT: 1.0
 * @see     https://github.com/prokerala/astrology-sdk
 */
class Token
{
    public $key;

    /**
     * Init Token
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }
}
