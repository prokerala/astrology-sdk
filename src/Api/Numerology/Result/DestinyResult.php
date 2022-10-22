<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class DestinyResult implements JsonSerializable
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
     * @var Number $number
     */
    private $number;
    /**
     * @var NameResult $nameResult
     */
    private $nameResult;
    /**
     * @param int $id
     * @param string $title
     * @param Number $number
     * @param NameResult $nameResult
     */
    public function __construct($id, $title, $number, $nameResult) {
        $this->id = $id;
        $this->title = $title;
        $this->number = $number;
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
     * @return Number
     */
    public function getNumber(): Number
    {
        return $this->number;
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
            'number' => $this->number,
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
