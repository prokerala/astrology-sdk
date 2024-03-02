<?php

namespace Prokerala\Api\Numerology\Result\Pythagorean\Components;

class EssenceNumber
{

    private string $name;
    /**
     * @var Essence[]
     */
    private array $essence;

    /**
     * @param Essence[] $essence
     */
    public function __construct(string $name, array $essence)
    {
        $this->name = $name;
        $this->essence = $essence;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Essence[]
     */
    public function getEssence(): array
    {
        return $this->essence;
    }
}
