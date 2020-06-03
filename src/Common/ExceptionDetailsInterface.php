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

namespace Prokerala\Common;

/**
 * ExceptionDetailsInterface
 *
 * PHP version 5
 */
interface ExceptionDetailsInterface
{
    /**
     * Function returns the exception message
     *
     * @return string
     */
    public function getDetails();

    /**
     * Function returns the exception code
     *
     * @return int
     */
    public function getCode();
}
