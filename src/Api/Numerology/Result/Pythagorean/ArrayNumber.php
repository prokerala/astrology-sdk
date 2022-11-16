<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class ArrayNumber
{
    private array $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function getArray(): array
    {
        return $this->array;
    }
}
