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

    /**
     * @param int|null $number
     * @param string $description
     * @param NameChart $nameChart
     */
    public function __construct (?int $number, string $description, NameChart $nameChart) {
        $this->number = $number;
        $this->description = $description;
        $this->nameResult = $nameChart;
    }

    /**
     * @return NameChart
     */
    public function getNameResult(): NameChart
    {
        return $this->nameResult;
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
