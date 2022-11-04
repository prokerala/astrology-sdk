<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PersonalityResult implements JsonSerializable
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
     * @param int $id
     * @param string $title
     * @param Number $number
     */
    public function __construct($id, $title, $number) {
        $this->id = $id;
        $this->title = $title;
        $this->number = $number;
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

    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'number' => $this->number,
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
