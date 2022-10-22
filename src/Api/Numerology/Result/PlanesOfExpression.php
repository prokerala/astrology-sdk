<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PlanesOfExpression implements JsonSerializable
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
    private $physical;
    /**
     * @var Number
     */
    private $mental;
    /**
     * @var Number
     */
    private $emotional;
    /**
     * @var Number
     */
    private $spiritual;

    /**
     * @param int $id
     * @param string $title
     * @param Number $physical
     * @param Number $mental
     * @param Number $emotional
     * @param Number $spiritual
     * @param NameResult $nameResult
     */
    public function __construct($id, $title, $physical, $mental, $emotional, $spiritual, $nameResult)
    {
        $this->id = $id;
        $this->title = $title;
        $this->physical = $physical;
        $this->mental = $mental;
        $this->emotional = $emotional;
        $this->spiritual = $spiritual;
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
     * @return Number
     */
    public function getSpiritual(): Number
    {
        return $this->spiritual;
    }

    /**
     * @return Number
     */
    public function getMental(): Number
    {
        return $this->mental;
    }

    /**
     * @return Number
     */
    public function getEmotional(): Number
    {
        return $this->emotional;
    }

    /**
     * @return Number
     */
    public function getPhysical(): Number
    {
        return $this->physical;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'physical' => $this->physical,
            'mental' => $this->mental,
            'emotional' => $this->emotional,
            'spiritual' => $this->spiritual,
            'name_result' => $this->nameResult,
        ];
    }
}
