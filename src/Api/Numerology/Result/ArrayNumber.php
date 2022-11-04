<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class ArrayNumber implements \JsonSerializable
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

    public function jsonSerialize(): array
    {
        return $this->array;
    }
}
