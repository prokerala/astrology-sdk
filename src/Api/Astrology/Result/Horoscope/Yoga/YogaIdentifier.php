<?php

namespace Prokerala\Api\Astrology\Result\Horoscope\Yoga;
class YogaIdentifier
{
    private $id;
    private $name;

    public function __construct(int $id,string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
