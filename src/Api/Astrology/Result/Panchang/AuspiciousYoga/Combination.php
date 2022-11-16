<?php



namespace Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga;

class Combination
{
    private string $type;

    private string $name;

    public function __construct(string $type, string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
