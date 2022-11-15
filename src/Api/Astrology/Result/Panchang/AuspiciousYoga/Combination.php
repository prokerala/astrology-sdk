<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang\AuspiciousYoga;

class Combination
{
    public function __construct(private string $type, private string $name)
    {
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
