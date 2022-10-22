<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class Transit implements JsonSerializable
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
     * @var Cycle[] $physical
     */
    private $physical;
    /**
     * @var Cycle[] $mental
     */
    private $mental;
    /**
     * @var Cycle[] $spiritual
     */
    private $spiritual;
    /**
     * @var NameResult $nameResult
     */
    private $nameResult;

    /**
     * @param int $id
     * @param string $title
     * @param Cycle[] $physical
     * @param Cycle[] $mental
     * @param Cycle[] $spiritual
     * @param NameResult $nameResult
     */
    public function __construct($id, $title, $physical, $mental, $spiritual, $nameResult){
        $this->id = $id;
        $this->title = $title;
        $this->physical = $physical;
        $this->mental = $mental;
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
     * @return array
     */
    public function getPhysical(): array
    {
        return $this->physical;
    }

    /**
     * @return array
     */
    public function getMental(): array
    {
        return $this->mental;
    }

    /**
     * @return array
     */
    public function getSpiritual(): array
    {
        return $this->spiritual;
    }

    /**
     * @return array{physical: Cycle[], mental: Cycle[], spiritual: Cycle[]}
//     * @return mixed
     */
    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'physical' => $this->physical,
            'mental' => $this->mental,
            'spiritual' => $this->spiritual,
            'name_result' => $this->nameResult,
        ];
    }
}
