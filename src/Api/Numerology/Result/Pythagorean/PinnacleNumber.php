<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class PinnacleNumber
{
    /**
     * @param AgeNumber[] $pinnacles
     */
    public function __construct(private string $name, private array $pinnacles)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AgeNumber[]
     */
    public function getPinnacles(): array
    {
        return $this->pinnacles;
    }
}
