<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;


class UniversalDay implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var UniversalDayNumber
     */
    private $universalDayNumber;


    /**
     * @param UniversalDayNumber $universalDayNumber
     */
    public function __construct(UniversalDayNumber $universalDayNumber) {
        $this->universalDayNumber = $universalDayNumber;
    }

    /**
     * @return UniversalDayNumber
     */
    public function getUniversalDayNumber(): UniversalDayNumber
    {
        return $this->universalDayNumber;
    }


}
