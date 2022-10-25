<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Chaldean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Chaldean\LifePathNumber;


class LifePath implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var LifePathNumber
     */
    private $lifePathNumber;


    /**
     * @param LifePathNumber $birthNumber
     */
    public function __construct(LifePathNumber $lifePathNumber) {
        $this->lifePathNumber = $lifePathNumber;
    }

    /**
     * @return BirthNumber
     */
    public function getBirthNumber(): LifePathNumber
    {
        return $this->lifePathNumber;
    }


}
