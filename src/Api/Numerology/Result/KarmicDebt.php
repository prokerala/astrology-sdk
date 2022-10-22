<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class KarmicDebt implements JsonSerializable
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
     * @var Number|null
     */
    private $lifePath;
    /**
     * @var Number|null
     */
    private $expression;
    /**
     * @var Number|null
     */
    private $heartDesire;
    /**
     * @var Number|null
     */
    private $personality;
    /**
     * @var Number|null
     */
    private $birthDay;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param int $id
     * @param string $title
     * @param Number|null $lifePath
     * @param Number|null $expression
     * @param Number|null $heartDesire
     * @param Number|null $personality
     * @param Number|null $birthDay
     * @param NameResult $nameResult
     */
    public function __construct(
         $id,
         $title,
         $lifePath,
         $expression,
         $heartDesire,
         $personality,
         $birthDay,
         $nameResult
    )
    {
         $this->id = $id;
         $this->title = $title;
         $this->lifePath = $lifePath;
         $this->expression = $expression;
         $this->heartDesire = $heartDesire;
         $this->personality = $personality;
         $this->birthDay = $birthDay;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }

    /**
     * @return ?Number
     */
    public function getPersonality(): ?Number
    {
        return $this->personality;
    }

    /**
     * @return ?Number
     */
    public function getBirthDay(): ?Number
    {
        return $this->birthDay;
    }

    /**
     * @return ?Number
     */
    public function getLifePath(): ?Number
    {
        return $this->lifePath;
    }

    /**
     * @return ?Number
     */
    public function getHeartDesire(): ?Number
    {
        return $this->heartDesire;
    }

    /**
     * @return ?Number
     */
    public function getExpression(): ?Number
    {
        return $this->expression;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'life_path' => $this->lifePath,
            'expression' => $this->expression,
            'heart_desire' => $this->heartDesire,
            'personality' => $this->personality,
            'name_result' => $this->nameResult,
        ];
    }
}
