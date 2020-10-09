<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Common;

/**
 * ExceptionDetailsInterface.
 *
 * PHP version 5
 */
interface ExceptionDetailsInterface
{
    /**
     * Function returns the exception message.
     *
     * @return string
     */
    public function getDetails();

    /**
     * Function returns the exception code.
     *
     * @return int
     */
    public function getCode();
}
