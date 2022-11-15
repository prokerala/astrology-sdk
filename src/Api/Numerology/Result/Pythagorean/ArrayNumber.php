<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class ArrayNumber
{
    public function __construct(private array $array)
    {
    }

    public function getArray(): array
    {
        return $this->array;
    }
}
