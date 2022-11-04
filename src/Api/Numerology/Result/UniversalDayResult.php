<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

class UniversalDayResult implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var Number
     */
    private $number;

    /**
     * @param int    $id
     * @param string $title
     * @param Number $number
     */
    public function __construct($id, $title, $number)
    {
        $this->id = $id;
        $this->title = $title;
        $this->number = $number;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): Number
    {
        return $this->number;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'number' => $this->number,
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
