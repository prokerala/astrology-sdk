<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

class PinnacleNumber
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var AgeNumber[]
     */
    private $pinnacles;

    /**
     * @param AgeNumber[] $pinnacles
     */
    public function __construct(string $name, array $pinnacles)
    {
        $this->name = $name;
        $this->pinnacles = $pinnacles;
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
