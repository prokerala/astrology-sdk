<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class LifeCycleResult implements JsonSerializable
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
     * @var AgeNumberDescription
     */
    private $firstCycle;
    /**
     * @var AgeNumberDescription
     */
    private $secondCycle;
    /**
     * @var AgeNumberDescription
     */
    private $thirdCycle;

    /**
     * @param int $id
     * @param string $title
     * @param AgeNumberDescription $firstCycle
     * @param AgeNumberDescription $secondCycle
     * @param AgeNumberDescription $thirdCycle
     */
    public function __construct($id, $title, $firstCycle, $secondCycle, $thirdCycle)
    {
        $this->id = $id;
        $this->title = $title;
        $this->firstCycle = $firstCycle;
        $this->secondCycle = $secondCycle;
        $this->thirdCycle = $thirdCycle;
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
     * @return AgeNumberDescription
     */
    public function getFirstCycle(): AgeNumberDescription
    {
        return $this->firstCycle;
    }

    /**
     * @return AgeNumberDescription
     */
    public function getSecondCycle(): AgeNumberDescription
    {
        return $this->secondCycle;
    }

    /**
     * @return AgeNumberDescription
     */
    public function getThirdCycle(): AgeNumberDescription
    {
        return $this->thirdCycle;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'first_cycle' => $this->firstCycle,
            'second_cycle' => $this->secondCycle,
            'third_cycle' => $this->thirdCycle,
        ];
    }
}
