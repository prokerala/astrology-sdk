<?php



namespace Prokerala\Api\Horoscope\Entity;

use Prokerala\Api\Astrology\Traits\StringableTrait;
use Prokerala\Api\Astrology\Western\Result\PlanetPositions\Planet;

class Zodiac
{
    use StringableTrait;

    private int $id;

    private string $name;

    private Planet $lord;

    public function __construct(int $id, string $name, Planet $lord)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lord = $lord;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLord(): Planet
    {
        return $this->lord;
    }
}

