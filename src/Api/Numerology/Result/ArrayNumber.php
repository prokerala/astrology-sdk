<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class ArrayNumber implements JsonSerializable
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

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    public function jsonSerialize(): array
    {
        return $this->array;
    }
}
