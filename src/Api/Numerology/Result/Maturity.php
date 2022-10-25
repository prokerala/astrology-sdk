<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class Maturity implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var MaturityNumber
     */
    private $maturityNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param MaturityNumber $maturityNumber
     * @param NameResult $nameResult
     */
    public function __construct(MaturityNumber $maturityNumber, NameResult $nameResult) {

        $this->maturityNumber = $maturityNumber;
        $this->nameResult = $nameResult;
    }

    /**
     * @return NameResult
     */
    public function getNameResult(): NameResult
    {
        return $this->nameResult;
    }

    /**
     * @return MaturityNumber
     */
    public function getMaturityNumber(): MaturityNumber
    {
        return $this->maturityNumber;
    }
}
