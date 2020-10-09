<?php

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
