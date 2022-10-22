<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;
use Prokerala\Api\Numerology\Result\AgeNumberDescription as PinnacleNumberResult;

class PinnacleNumbers implements JsonSerializable
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
     * @var PinnacleNumberResult
     */
    private $firstPinnacle;
    /**
     * @var PinnacleNumberResult
     */
    private $secondPinnacle;
    /**
     * @var PinnacleNumberResult
     */
    private $thirdPinnacle;
    /**
     * @var PinnacleNumberResult
     */
    private $fourthPinnacle;
    /**
     * @param int $id
     * @param string $title
     * @param PinnacleNumberResult $firstPinnacle
     * @param PinnacleNumberResult $secondPinnacle
     * @param PinnacleNumberResult $thirdPinnacle
     * @param PinnacleNumberResult $fourthPinnacle
     */
    public function __construct($id, $title, $firstPinnacle, $secondPinnacle, $thirdPinnacle, $fourthPinnacle)
    {
        $this->id = $id;
        $this->title = $title;
        $this->firstPinnacle = $firstPinnacle;
        $this->secondPinnacle = $secondPinnacle;
        $this->thirdPinnacle = $thirdPinnacle;
        $this->fourthPinnacle = $fourthPinnacle;
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
     * @return PinnacleNumberResult
     */
    public function getFirstPinnacle(): PinnacleNumberResult
    {
        return $this->firstPinnacle;
    }

    /**
     * @return PinnacleNumberResult
     */
    public function getSecondPinnacle(): PinnacleNumberResult
    {
        return $this->secondPinnacle;
    }

    /**
     * @return PinnacleNumberResult
     */
    public function getThirdPinnacle(): PinnacleNumberResult
    {
        return $this->thirdPinnacle;
    }

    /**
     * @return PinnacleNumberResult
     */
    public function getFourthPinnacle(): PinnacleNumberResult
    {
        return $this->fourthPinnacle;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' =>$this->id,
            'title' =>$this->title,
            'first_pinnacle' => $this->firstPinnacle,
            'second_pinnacle' => $this->firstPinnacle,
            'third_pinnacle' => $this->firstPinnacle,
            'fourth_pinnacle' => $this->firstPinnacle,
        ];
    }
}
