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
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param int|null $number
     * @param string $description
     * @param NameResult $nameResult
     */
    public function __construct (?int $number, string $description, NameResult $nameResult) {
        $this->number = $number;
        $this->description = $description;
        $this->nameResult = $nameResult;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
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
