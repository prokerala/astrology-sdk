<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class Number
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ?int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    /**
     * @param string $name
     * @param int|null $number
     * @param string $description
     */
    public function __construct (string $name, ?int $number, string $description) {
        $this->name = $name;
        $this->number = $number;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

}
