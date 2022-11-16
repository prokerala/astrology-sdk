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
     * @var list<\stdClass>
     */
    private array $errors;

    /**
     * @param list<\stdClass> $errors
     */
    public function __construct($errors, int $code = 0, ?\Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct('Input is invalid', $code, $previous);
    }

    /**
     * Get validation errors.
     *
     * @return list<\stdClass>
     */
    public function getValidationErrors()
    {
        return $this->errors;
    }
}
