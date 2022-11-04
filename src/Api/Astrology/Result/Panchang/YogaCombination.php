<?php

declare(strict_types=1);

namespace Prokerala\Api\Astrology\Result\Panchang;

class YogaCombination
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

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
