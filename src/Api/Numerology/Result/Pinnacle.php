<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\PinnacleNumber\FirstPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumber\SecondPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumber\ThirdPinnacle;
use Prokerala\Api\Numerology\Result\PinnacleNumber\FourthPinnacle;


class Pinnacle implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PinnacleResult
     */
    private $pinnacle;


    /**
     * @param PinnacleResult $challenge
     */
    public function __construct(PinnacleResult $pinnacle) {
        $this->pinnacle = $pinnacle;
    }

    /**
     * @return PinnacleResult
     */
    public function getPinnacle(): PinnacleResult
    {
        return $this->pinnacle;
    }

}
