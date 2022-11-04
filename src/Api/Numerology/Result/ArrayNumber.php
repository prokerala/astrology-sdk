<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class ArrayNumber
{
    /**
     * @var array
     */
    private $array;

    /**
     * @param array $array
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    public function getArray(): array
    {
        return $this->array;
    }
}
