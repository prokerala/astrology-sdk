<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Api;

/**
 * Defines the Tithi contains Id, Name, Start, End.
 *
 * PHP version 5
 *
 * @category API_SDK
 *
 * @author   Vimal <api@api.prokerala.com>
 * @license  https://api.prokerala.com/license.txt MIT License
 *
 * @version  GIT: 1.0
 *
 * @see     https://github.com/prokerala/astrology-sdk
 */
class Token
{
    public $key;

    /**
     * Init Token.
     *
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }
}
