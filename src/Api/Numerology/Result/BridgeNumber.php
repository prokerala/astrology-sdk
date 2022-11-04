<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class BridgeNumber
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Number[]
     */
    private $differences;

    /**
     * @param Number[] $differences
     */
    public function __construct(string $name, array $differences)
    {
        $this->name = $name;
        $this->differences = $differences;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Number[]
     */
    public function getDifferences(): array
    {
        return $this->differences;
    }
}
