<?php
declare(strict_types=1);

namespace Prokerala\Api\Numerology\Result;

use Prokerala\Api\Astrology\Result\ResultInterface;
use Prokerala\Api\Astrology\Traits\Result\RawResponseTrait;

class SubconsciousSelf implements ResultInterface
{
    use RawResponseTrait;

    /**
     * @var SubconsciousSelfNumber
     */
    private $subconsciousSelfNumber;
    /**
     * @var NameResult
     */
    private $nameResult;

    /**
     * @param SubconsciousSelfNumber $subconsciousSelfNumber
     * @param NameResult $nameResult
     */
    public function __construct(SubconsciousSelfNumber $subconsciousSelfNumber, NameResult $nameResult) {

        $this->subconsciousSelfNumber = $subconsciousSelfNumber;
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
     * @return SubconsciousSelfNumber
     */
    public function getSubconsciousSelfNumber(): SubconsciousSelfNumber
    {
        return $this->subconsciousSelfNumber;
    }
}
