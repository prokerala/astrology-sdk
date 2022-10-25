<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;


class PersonalMonth implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalMonthNumber
     */
    private $personalMonthNumber;


    /**
     * @param PersonalMonthNumber $personalMonthNumber
     */
    public function __construct(PersonalMonthNumber $personalMonthNumber) {
        $this->personalMonthNumber = $personalMonthNumber;
    }

    /**
     * @return PersonalMonthNumber
     */
    public function getPersonalMonthNumber(): PersonalMonthNumber
    {
        return $this->personalMonthNumber;
    }


}
