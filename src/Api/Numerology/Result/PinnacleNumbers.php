<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;
use JsonSerializable;

class PinnacleNumbers
{

    /**
     * @var AgeNumber[]
     */
    private array $pinnacles;

    /**
     * @param AgeNumber $pinnacles
     */
    public function __construct(array $pinnacles)
    {
        $this->pinnacles = $pinnacles;
    }
    /**
     * @return AgeNumber[]
     */
    public function getPinnacles(): array
    {
        return $this->pinnacles;
    }


}
