<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class NameNumber
{
    /**
     * @var ?int
     */
    private $number;

    /**
     * @var string
     */
    private $description;

    /**
     * @var NameChart
     */
    private $nameChart;

    public function __construct(?int $number, string $description, NameChart $nameChart)
    {
        $this->number = $number;
        $this->description = $description;
        $this->nameResult = $nameChart;
    }

    public function getNameResult(): NameChart
    {
        return $this->nameResult;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
