<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class KarmicLessonResult implements JsonSerializable
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
     * @var ArrayNumber
     */
    private $arrayNumber;
    /**
     * @var NameResult $nameResult
     */
    private $nameResult;

    public function __construct($id, $title, $arrayNumber, $nameResult) {
        $this->id = $id;
        $this->title = $title;
        $this->arrayNumber = $arrayNumber;
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
     * @return ArrayNumber
     */
    public function getArrayNumber(): ArrayNumber
    {
        return $this->arrayNumber;
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
            'array_number' => $this->arrayNumber,
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
