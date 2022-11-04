<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
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

    /**
     * @param string $name
     * @param FirstPinnacle $firstPinnacle
     * @param SecondPinnacle $secondPinnacle
     * @param ThirdPinnacle $thirdPinnacle
     * @param FourthPinnacle $fourthPinnacle
     */
    public function __construct(string $name, FirstPinnacle $firstPinnacle, SecondPinnacle $secondPinnacle, ThirdPinnacle $thirdPinnacle, FourthPinnacle $fourthPinnacle) {
        $this->name = $name;
        $this->firstPinnacle = $firstPinnacle;
        $this->secondPinnacle = $secondPinnacle;
        $this->thirdPinnacle = $thirdPinnacle;
        $this->fourthPinnacle = $fourthPinnacle;

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return FirstPinnacle
     */
    public function getFirstPinnacle(): FirstPinnacle
    {
        return $this->firstPinnacle;
    }

    /**
     * @return SecondPinnacle
     */
    public function getSecondPinnacle(): SecondPinnacle
    {
        return $this->secondPinnacle;
    }

    /**
     * @return ThirdPinnacle
     */
    public function getThirdPinnacle(): ThirdPinnacle
    {
        return $this->thirdPinnacle;
    }

    /**
     * @return FourthPinnacle
     */
    public function getFourthPinnacle(): FourthPinnacle
    {
        return $this->fourthPinnacle;
    }

}
