<?php

/*
 * This file is part of Prokerala Astrology API PHP SDK
 *
 * © Ennexa Technologies <info@ennexa.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Prokerala\Common\Api\Exception;

class ValidationException extends \InvalidArgumentException
{
    private $errors;

    public function __construct($errors, $code = 0, $previous = null)
    {
        $this->errors = $errors;
        parent::__construct('Input is invalid', $code, $previous);
    }

    /**
     * Get validation errors.
     *
     * @return array
     */
    public function getValidationErrors()
    {
        return $this->errors;
    }
}
