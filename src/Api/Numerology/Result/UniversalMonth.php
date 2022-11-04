<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;


class UniversalMonth implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var UniversalMonthNumber
     */
    private $universalMonthNumber;


    /**
     * @param UniversalMonthNumber $universalMonthNumber
     */
    public function __construct(UniversalMonthNumber $universalMonthNumber) {
        $this->universalMonthNumber = $universalMonthNumber;
    }

    /**
     * @return UniversalMonthNumber
     */
    public function getUniversalMonthNumber(): UniversalMonthNumber
    {
        return $this->universalMonthNumber;
    }


}
