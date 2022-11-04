<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class PersonalYear implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var PersonalYearNumber
     */
    private $personalYearNumber;


    /**
     * @param PersonalYearNumber $personalYearNumber
     */
    public function __construct(PersonalYearNumber $personalYearNumber) {
        $this->personalYearNumber = $personalYearNumber;
    }

    /**
     * @return PersonalYearNumber
     */
    public function getPersonalYearNumber(): PersonalYearNumber
    {
        return $this->personalYearNumber;
    }


}
