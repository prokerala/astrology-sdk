<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;


class PersonalDay implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalDayNumber
     */
    private $personalDayNumber;


    /**
     * @param PersonalDayNumber $personalDayNumber
     */
    public function __construct(PersonalDayNumber $personalDayNumber) {
        $this->personalDayNumber = $personalDayNumber;
    }

    /**
     * @return PersonalDayNumber
     */
    public function getPersonalDayNumber(): PersonalDayNumber
    {
        return $this->personalDayNumber;
    }


}
