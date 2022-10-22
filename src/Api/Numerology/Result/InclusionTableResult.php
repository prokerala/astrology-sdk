<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class InclusionTableResult implements JsonSerializable
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $title
     */
    private $title;
    /**
     * @var array
     */
    private $inclusionNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param int $id
     * @param string $title
     * @param array $inclusionNumber
     * @param NameResult $nameResult
     */
    public function __construct($id, $title, $inclusionNumber, $nameResult)
    {
        $this->id = $id;
        $this->title = $title;
        $this->inclusionNumber = $inclusionNumber;
        $this->nameResult = $nameResult;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return InclusionNumber[]
     */
    public function getInclusionNumber(): array
    {
        return $this->inclusionNumber;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'InclusionNumber' => $this->inclusionNumber,
            'name_result' => $this->nameResult,
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
