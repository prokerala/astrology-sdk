<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result\Pythagorean;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;
use Prokerala\Api\Numerology\Result\Pythagorean\Components\PeriodCycleNumber;

class PeriodCycleNumberResult implements ResultInterface
{
    use RawResponseTrait;

    private PeriodCycleNumber $periodCycleNumber;

    public function __construct(
        PeriodCycleNumber $periodCycleNumber
    ) {
        $this->periodCycleNumber = $periodCycleNumber;
    }

    public function getPeriodCycleNumber(): PeriodCycleNumber
    {
        return $this->periodCycleNumber;
    }
}
