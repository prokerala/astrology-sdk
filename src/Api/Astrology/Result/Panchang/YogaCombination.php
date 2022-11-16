<?php



namespace Prokerala\Api\Astrology\Result\Panchang;

class YogaCombination
{
    private string $type;

    private string $description;

    public function __construct(string $type, string $description)
    {
        $this->type = $type;
        $this->description = $description;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
