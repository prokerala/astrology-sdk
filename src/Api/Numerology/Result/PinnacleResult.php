<?php

declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Numerology\Result\PinnacleNumbers\FirstPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumbers\FourthPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumbers\SecondPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumbers\ThirdPinnacle;

class PinnacleResult
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var FirstPinnacle
     */
    private $firstPinnacle;

    /**
     * @var SecondPinnacle
     */
    private $secondPinnacle;

    /**
     * @var ThirdPinnacle
     */
    private $thirdPinnacle;

    /**
     * @var FourthPinnacle
     */
    private $fourthPinnacle;

    public function __construct(string $name, FirstPinnacle $firstPinnacle, SecondPinnacle $secondPinnacle, ThirdPinnacle $thirdPinnacle, FourthPinnacle $fourthPinnacle)
    {
        $this->name = $name;
        $this->firstPinnacle = $firstPinnacle;
        $this->secondPinnacle = $secondPinnacle;
        $this->thirdPinnacle = $thirdPinnacle;
        $this->fourthPinnacle = $fourthPinnacle;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstPinnacle(): FirstPinnacle
    {
        return $this->firstPinnacle;
    }

    public function getSecondPinnacle(): SecondPinnacle
    {
        return $this->secondPinnacle;
    }

    public function getThirdPinnacle(): ThirdPinnacle
    {
        return $this->thirdPinnacle;
    }

    public function getFourthPinnacle(): FourthPinnacle
    {
        return $this->fourthPinnacle;
    }
}
