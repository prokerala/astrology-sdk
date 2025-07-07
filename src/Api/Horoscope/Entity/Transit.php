<?php



namespace Prokerala\Api\Horoscope\Entity;

use Prokerala\Api\Astrology\Result\Element\Rasi;
use Prokerala\Api\Astrology\Traits\StringableTrait;

class Transit
{
    use StringableTrait;

    private int $id;
    private string $name;
    private Zodiac $zodiac;
    private int $houseNumber;
    private bool $isRetrograde;

    public function __construct(int $id, string $name, Zodiac $zodiac, int $houseNumber, bool $isRetrograde)
    {
        $this->id = $id;
        $this->name = $name;
        $this->zodiac = $zodiac;
        $this->houseNumber = $houseNumber;
        $this->isRetrograde = $isRetrograde;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getZodiac(): Zodiac
    {
        return $this->zodiac;
    }
    public function getHouseNumber(): int
    {
        return $this->houseNumber;
    }
    public function getIsRetrograde(): bool
    {
        return $this->isRetrograde;
    }
}

