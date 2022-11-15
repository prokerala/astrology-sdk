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

final class ValidationException extends \InvalidArgumentException
{
    /**
     * @param list<array{source:array{pointer?: string, parameter?: string, header?: string},code: string, title: string, detail: string}> $errors
     * @param int                                                                                                                          $code
     * @param null|\Throwable                                                                                                              $previous
     */
    public function __construct(private $errors, $code = 0, $previous = null)
    {
        parent::__construct('Input is invalid', $code, $previous);
    }

    /**
     * Get validation errors.
     *
     * @return list<array{source:array{pointer?: string, parameter?: string, header?: string},code: string, title: string, detail: string}>
     */
    public function getValidationErrors()
    {
        return $this->errors;
    }
}
