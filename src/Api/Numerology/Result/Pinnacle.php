<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Pinnacle implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PinnacleNumber
     */
    private $pinnacleNumber;


    /**
     * @param PinnacleNumber $pinnacleNumber
     */
    public function __construct(PinnacleNumber $pinnacleNumber) {
        $this->pinnacleNumber = $pinnacleNumber;
    }

    /**
     * @return PinnacleNumber
     */
    public function getPinnacleNumber(): PinnacleNumber
    {
        return $this->pinnacleNumber;
    }

}
