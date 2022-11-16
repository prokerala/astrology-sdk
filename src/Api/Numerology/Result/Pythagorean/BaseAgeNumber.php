<?php



namespace Prokerala\Api\Numerology\Result\Pythagorean;

class BaseAgeNumber
{
    private string $name;

    private int $number;

    private string $description;

    private string $age;

    public function __construct(string $name, int $number, string $description, string $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->number = $number;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAge(): string
    {
        return $this->age;
    }
}
