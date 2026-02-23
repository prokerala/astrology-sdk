<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;
use Prokerala\Api\Astrology\Result\Element\Planet;
use Prokerala\Api\Astrology\Result\Horoscope\Yoga\YogaIdentifier;

class BasicRajaYogaResult
{

    private string $name;
    private array $influence;
    private array $combination;
    private YogaIdentifier $nature;
    private array $category;

    /**
     * @param string $name
     * @param YogaIdentifier[] $influence
     * @param \Prokerala\Api\Astrology\Result\Element\Planet[] $combination
     * @param YogaIdentifier $nature
     * @param YogaIdentifier[] $category
     */
    public function __construct(
        string $name,
        array $influence,
        array $combination,
        YogaIdentifier $nature,
        array $category,
    ) {
        $this->name = $name;
        $this->influence = $influence;
        $this->combination = $combination;
        $this->nature = $nature;
        $this->category = $category;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getInfluence(): array
    {
        return $this->influence;
    }

    /**
     * @return \Prokerala\Api\Astrology\Result\Element\Planet[]
     */
    public function getCombination(): array
    {
        return $this->combination;
    }
    public function getCategory(): array
    {
        return $this->category;
    }
    public function getNature():YogaIdentifier
    {
        return $this->nature;
    }

}
