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

    /**
     * @param string $type
     * @param string $description
     */
    public function __construct(string $type, string $description)
    {
        $this->type = $type;
        $this->description = $description;
    }
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}
