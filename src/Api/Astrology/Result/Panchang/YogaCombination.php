<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang;

class YogaCombination
{
    public function __construct(private string $type, private string $description)
    {
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
