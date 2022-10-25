<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\LifeCycle\FirstCycle;
use Prokerala\Api\Numerology\Result\LifeCycle\SecondCycle;
use Prokerala\Api\Numerology\Result\LifeCycle\ThirdCycle;

class LifeCycle implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var LifeCycleResult
     */
    private $lifeCycle;


    /**
     * @param LifeCycleResult $lifeCycle
     */
    public function __construct(LifeCycleResult $lifeCycle) {
        $this->lifeCycle = $lifeCycle;
    }

    /**
     * @return LifeCycleResult
     */
    public function getLifeCycle(): LifeCycleResult
    {
        return $this->lifeCycle;
    }

}
